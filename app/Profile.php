<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name', 'last_name', 'gender',
        'street_name', 'house_number', 'postal_code', 'city', 'country_id',
        'passport_id', 'passport_issuance_date', 'passport_expirition_date', 'birthday', 'country_of_birth', 'country_of_passport_issuance',
        'account_id', 'deposit_amount'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function enrollCommission() {
        $aum = $this->deposit_amount;
        $enrollCommission = 0;
        if ($aum >= 5000) {
            return 450;
        } elseif ($aum >= 1000 && $aum < 5000) {
            return 300;
        } elseif ($aum >= 600 && $aum < 1000) {
            return 200;
        } elseif ($aum >= 300 && $aum < 600) {
            return 150;
        }
        return $enrollCommission;
    }
}
