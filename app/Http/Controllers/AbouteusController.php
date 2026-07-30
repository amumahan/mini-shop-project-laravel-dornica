<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbouteusController
{
    //
    public function index()
    {
        $withoutSlider = true;
        return view('abouteus',compact('withoutSlider'));
    }
}
