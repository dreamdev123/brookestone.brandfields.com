<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\Mail\Welcome;
use App\User;
use App\Profile;
use App\Country;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use GeoIP;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    private static $DEFAULT_COUNTRY_ID = 211; // Sweden
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $sponsor_set_by_cookie = false;
        $sponsor = null;

        if ($referralCookie = \Cookie::get('referral_id')) {
            $sponsor_user = User::where('customer_id', $referralCookie)->first();
            if ($sponsor_user) {
                $sponsor = $sponsor_user->username;
                $sponsor_set_by_cookie = true;
            }
        }
        $countries = Country::where('active', 1)->where('Name', '!=', 'United States')->get();
        $phone_code = Country::where('code', GeoIP::getLocation()['iso_code'])->get();

        return view('auth.register')
            ->with('sponsor', $sponsor)
            ->with('sponsor_set_by_cookie', $sponsor_set_by_cookie)
            ->with('countries', $countries)
            ->with('phonecode', !isset($phone_code)?$phone_code[0]->phonecode:'');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        // send email logic
        
        $userData = [
            'first_name' => $user->profile->first_name,
            'last_name' => $user->profile->last_name,
            'customer_id' => $user->customer_id
        ];
        
        try {
            Mail::to($user->email)
                ->send(new Welcome($userData));
            echo 'Message has been sent. ';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$e->ErrorInfo}";
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:5|max:50|unique:users',
            'email' => 'required|string|email|min:6|max:64|unique:users',
            'password' => 'required|string|min:7|max:64|confirmed',
            'password_confirmation' => 'required|same:password',
            'phone' => 'required',

            'first_name' => 'required|string|min:2|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'gender' => 'required',
            'street_name' => 'required',
            'house_number' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'passport_id' => 'required',
            'passport_issuance_date' => 'required',
            'passport_expirition_date' => 'required',
            'birthday' => 'required',
            'country_of_birth' => 'required',
            'country_of_passport_issuance' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Check referral cookie first - it is most important
        $sponsor_user = null;

        if ($referralCookie = \Cookie::get('referral_id')) {
            $sponsor_user = User::where('customer_id', $referralCookie)->first();
        }

        if (!$sponsor_user && !empty($data['sponsor'])) {
            $sponsor_user = User::where(['username' => $data['sponsor']])->first();
        }

        if (!isset($sponsor_user)) {
            return redirect(route('register'))
                ->withErrors([
                    'message' => trans('auth.sponsor_failed')
                ]);
        }

        if (strtolower($sponsor_user->email) == strtolower($data['email'])) {
            return redirect(route('register'))
                ->withErrors([
                    'message' => 'The email seems to be exist !'
                ]);
        }


        // 6 digit random number, unique in DB
        $attempt = 1;
        $attempt_max = 5;
        $customer_id = null;
        do {
            $customer_id = rand(100000,999999);
            $attempt++;
        } while (User::where('customer_id', $customer_id)->exists() && $attempt <= $attempt_max);

        if ($attempt > $attempt_max) {
            \Log::error("Could not generate unique customer_id");
            abort(500, 'Could not generate unique Customer ID. Please contact Support.');
        }

        $user = User::create([
            'username' => $data['username'],
            'customer_id' => $customer_id,
            'phone' => $data['phone'],
            'email' => $data['email'],
            'sponsor_id' => $sponsor_user->id,
            'password' => Hash::make($data['password']),
            'parent_id' => $sponsor_user->id,
        ]);

        Profile::create([
            'user_id' => $user->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'street_name' => $data['street_name'],
            'house_number' => $data['house_number'],
            'postal_code' => $data['postal_code'],
            'city' => $data['city'],
            'country_id' => $data['country'] ? : self::$DEFAULT_COUNTRY_ID,
            'passport_id' => $data['passport_id'],
            'passport_issuance_date' => $data['passport_issuance_date'],
            'passport_expirition_date' => $data['passport_expirition_date'],
            'birthday' => $data['birthday'],
            'country_of_birth' => $data['country_of_birth'],
            'country_of_passport_issuance' => $data['country_of_passport_issuance']
        ]);

        return $user;
    }

    public function verify(Request $request) {
        if ($request->input('key') == 'verifyEmail') {
            return response()->json(['status' => User::where('email', $request->input('value'))->exists()]);
        } else if ($request->input('key') == 'verifyUsername') {
            return response()->json(['status' => User::where('username', $request->input('value'))->exists()]);
        }
    }
}
