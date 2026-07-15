<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\ProfileEditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    //
    public function index()
    {
        $withoutSlider = true;
        $withoutFooter = true;
        return view('account.layouts.profile',compact('withoutSlider','withoutFooter'));
    }

    public function edit(ProfileEditRequest $request)
    {
        $user = User::query()
        ->where('id','=',Auth::id())
        ->first();
        dd($user->toArray());
        dd($request->all());
    }
}
