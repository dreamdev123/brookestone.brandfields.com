<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Carbon\Carbon;
use GeoIP;

class AdminController extends Controller
{
    public function index($userID = Null) 
    {
    	$userId = $userID ? $userID : Auth::user()->id;
    	$data['user'] = User::find($userId);
    	if (!isset($data['user']))
    		$data['user'] = User::find(Auth::user()->id);
        $data['countries'] = Country::where('active', 1)->get();
        $sponsor = User::find($data['user']->sponsor_id);

        if (!isset($sponsor))
            $data['sponsor'] = '';
        else
            $data['sponsor'] = $sponsor->profile->first_name . ' ' . $sponsor->profile->last_name;

    	return view('admin.index', $data);
    }

    public  function filter(Request $request)
    {
        $users = User::query()
            ->when($keyword = $request->get('keyword'), function ($query) use ($keyword) {
                /** @var Builder $query */
                $query->where(function ($query) use ($keyword) {
                    /** @var Builder $query */
                    $query->whereRaw('concat(username," ",email) LIKE ?', "%{$keyword}%");
                });
            })
            ->when($memberId = $request->get('memberId'), function ($query) use ($memberId) {
                /** @var Builder $query */
                $query->where(function ($query) use ($memberId) {
                    /** @var Builder $query */
                    $query->whereRaw('concat(customer_id) LIKE ?', "%{$memberId}%");
                });
            })
            ->get();
        if (count($users)) {
            $profiles = [];
            foreach($users as $user) {
                array_push($profiles, $user->profile);
            }
            return response()->json(['users' => $users, 'profiles' => $profiles, 'status' => true]);
        } else {
            return response()->json(['status' => false, 'users' => $users]);
        }
    }

    //
    function profileUsername(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:5|unique:users,username,' . $request->get('userId') . ',id'
        ]);
        if ($validator->fails())
            return response()->json(['status' => false, 'message' => $validator->errors()]);

        $user = User::find($request->get('userId'));
        $user->username = $request->get('username');
        $user->push();

        return response()->json(['status' => true]);
    }

    //
    function profileSponsorId(Request $request)
    {
        $sponsor = User::where('customer_id', $request->get('sponsor_customer_id'))->first();
        if (!isset($sponsor))
            return response()->json(['status' => false, 'message' => ['Sponsor id' => ['No Sponsor!']]]);

        $user = User::find($request->get('userId'));
        $user->sponsor_id = $sponsor->id;
        $user->push();
        
        return response()->json(['status' => true]);
    }

    //
    function profileProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'passport_id' => 'required',
            'gender' => 'required',
            'country_of_birth' => 'required',
            'date_of_passport_issuance' => 'required',
            'date_of_passport_expiration' => 'required',
            'country_of_passport_issuance' => 'required',
            'email' => 'required|string|email|min:6|max:64|unique:users,email,' . $request->get('userId') . ',id',
            'mobile_number' => 'required',
            'street_name' => 'required',
            'house_number' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'city' => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['status' => false, 'message' => $validator->errors()]);

        $user = User::find($request->get('userId'));
        $user->email = $request->input('email');
        $user->phone = $request->input('mobile_number');
        $user->push();

        $profile = $user->profile;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->gender = $request->input('gender');
        $profile->street_name = $request->input('street_name');
        $profile->house_number =$request->input('house_number');
        $profile->city = $request->input('city');
        $profile->country_id = $request->input('country') ? : self::$DEFAULT_COUNTRY_ID;
        $profile->postal_code = $request->input('postal_code');
        $profile->passport_id = $request->input('passport_id');
        $profile->passport_issuance_date = $request->input('date_of_passport_issuance');
        $profile->passport_expirition_date = $request->input('date_of_passport_expiration');
        $profile->birthday = $request->input('date_of_birth');
        $profile->country_of_birth = $request->input('country_of_birth');
        $profile->country_of_passport_issuance = $request->input('country_of_passport_issuance');
        $profile->push();

        return response()->json(['status' => true]);
    }

    //
    function profilePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:5|max:64|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails())
            return response()->json(['status' => false, 'message' => $validator->errors()]);

        $user = User::find($request->get('userId'));
        $user->password = Hash::make($request->input('password'));
        $user->push();

        return response()->json(['status' => true]);
    }
}
