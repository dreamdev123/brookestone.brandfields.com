<?php

namespace App\Console\Commands;

use App\Profile;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Log;
use RuntimeException;
use Carbon\Carbon;

class GetDepositByAccountId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:deposit_amount_by_account_id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the deposit amount by account id of the users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = Profile::whereNotNull('account_id')->where('deposit_amount', '=', 0)->get();
        foreach ($users as $key => $user) {
            $url = config('app.affiliate_api_url') . "?command=registrations&api_username=" . config('app.affiliate_api_username') . "&api_password=" . config('app.affiliate_api_password') . "&userid=" . config('app.affiliate_api_brand') . "-" . $user->account_id . "&todate=" . Carbon::now()->format('Y-m-d') . "&json=1";
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            $result = json_decode($result, true);
            if (isset($result['registrations'])) {
                if ($result['registrations'][0]['First_Deposit'] > 0) {
                    $user->deposit_amount = $result['registrations'][0]['First_Deposit'];
                    $user->save();
                }
            }
        }
    }
}
