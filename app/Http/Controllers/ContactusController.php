<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactusCreateRequest;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactusController
{
    //
    public function index()
    {
        $withoutSlider = true;
        return view('contactus',compact('withoutSlider'));
    }

    public function create(ContactusCreateRequest $request)
    {
        $input = $request->validated();
        Contactus::create($input);
        return redirect()->back()->with('general','نظر با موفق ثبت شد');
    }
}
