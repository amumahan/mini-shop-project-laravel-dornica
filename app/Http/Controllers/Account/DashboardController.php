<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

class DashboardController
{
    //
    public function dashboard()
    {
        $withoutSlider = true;
        $withoutFooter = true;
        return view('account.layouts.dashboard',compact('withoutSlider','withoutFooter'));
    }
}
