<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

class ProfileController
{
    //
    public function profile()
    {
        $withoutSlider = true;
        $withoutFooter = true;
        return view('account.layouts.profile',compact('withoutSlider','withoutFooter'));
    }
}
