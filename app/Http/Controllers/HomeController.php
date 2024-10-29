<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Country;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('panel.home');
    }

    public function profile()
    {
        $authUser = Auth::user();
        $countries = Country::where('active', 1)->where('Name', '!=', 'United States')->get();
        return view('panel.profile')
                    ->with('user', $authUser)
                    ->with('countries', $countries);
    }

    public function participation()
    {
        $authUser = Auth::user();
        return view('panel.participation')
                    ->with('user', $authUser);
    }

    public function createAccount()
    {
        $authUser = Auth::user();
        $authUserCountry = Country::find($authUser->profile->country_id);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, config('app.affiliate_api_url') . config('app.affiliate_api_brand'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_username=" . config('app.affiliate_api_username') . "&api_password=" . config('app.affiliate_api_password') . "&module=customer&command=add&firstname=" . $authUser->profile->first_name . "&lastname=" . $authUser->profile->last_name . "&email=" . $authUser->email . "&password=a12345678&phone_code=" . $authUserCountry->phonecode . "&phone=" . $authUser->phone . "&country=" . $authUserCountry->code . "&subCampaign=CX-TEST&json=1");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $result = json_decode($result, true);

        if ($result['operation_status'] === 'fail') {
            return response()->json(['status' => false, 'message' => $result['message']]);
        } elseif ($result['operation_status'] === 'OK') {
            $profile = $authUser->profile;
            $profile->account_id = $result['created_user_id'];
            $profile->save();
            return response()->json(['status' => true, 'url' => $result['auto_login_link']]);
        } else {
            return response()->json(['status' => false, 'message' => $result['message']]);
        }
        
    }

    public function portfolio()
    {
        return view('panel.portfolio');
    }

    public function referrals()
    {
        $authUser = Auth::user();
        $totalAum = $totalCommission = 0;
        foreach($authUser->referrers as $user) {
            $totalAum += $user->profile->deposit_amount;
            $totalCommission += $user->profile->enrollCommission();
        }
        return view('panel.referrals')
                    ->with('user', $authUser)
                    ->with('totalAum', $totalAum)
                    ->with('totalCommission', $totalCommission);
    }

    public function commissions()
    {
        $authUser = Auth::user();
        $monthArr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $data = $authUser->referrers()->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            })
            ->map(function($traffic){
                return $traffic->groupBy(function($date){
                    return Carbon::parse($date->created_at)->format('F'); // grouping by Months
                });
            })->toArray();

        $startYear = $authUser->referrers->first();
        
        if (!isset($startYear)) {
            $startYear = (int)Carbon::now()->format('Y');
        } else {
            $startYear = Carbon::parse($startYear->created_at)->format('Y');
        }

        $commissionTraffic = [];

        for ($year = $startYear; $year <= (int)Carbon::now()->format('Y'); $year++) {
            $commissionTraffic[$year] = [
                'yearlyCommission' => 0,
                'monthly' => []
            ];

            $sumYearlyCommission = 0;
            foreach($monthArr as $key=>$month) {
                $commissionTraffic[$year]['monthly'][$month] = 'n/a';
                if(isset($data[$year]) && isset($data[$year][$month])) {
                    $sumMonthlyAum = $sumMonthlyCommission = 0;

                    foreach ($data[$year][$month] as $info) {
                        $user = User::find($info['id']);
                        $sumMonthlyCommission += $user->profile->enrollCommission();
                        $sumMonthlyAum += $user->profile->deposit_amount;
                        
                    }
                    $sumYearlyCommission += $sumMonthlyCommission;
                    $commissionTraffic[$year]['monthly'][$month] = number_format($sumMonthlyAum, '2', '.', ',');
                }
            }
            $commissionTraffic[$year]['yearlyCommission'] = (double)$sumYearlyCommission !== 0 ? number_format($sumYearlyCommission, '2', '.', ',') : 'n/a';
        }

        return view('panel.commissions')
                    ->with('commissionTraffic', $commissionTraffic);
    }

    public function news()
    {
        return view('panel.news');
    }

    public function downloads()
    {
        return view('panel.download');
    }

    public function support()
    {
        return view('panel.support');
    }
}
