<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactusController
{
    //
    public function index()
    {
        $withoutSlider = true;
        return view('contactus',compact('withoutSlider'));
    }
}
