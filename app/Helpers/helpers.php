<?php


// if (!function_exists('enroll_commission')) {
    public function enroll_commission($aum = 0) {
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
// }
