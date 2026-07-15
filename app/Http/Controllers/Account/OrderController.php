<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

class OrderController
{
    //
    public function orders()
    {
        $withoutSlider = true;
        $withoutFooter = true;
        return view('account.orders',compact('withoutSlider','withoutFooter'));
    }
}
