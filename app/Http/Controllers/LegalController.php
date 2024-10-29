<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LegalController extends Controller
{

    public function termsOfconditions()
    {
        return view('terms-of-conditions');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function riskWarning()
    {
        return view('risk-warning');
    }

    public function own()
    {
        return view('own');
    }

}
