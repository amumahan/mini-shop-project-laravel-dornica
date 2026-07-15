<?php

namespace App\Http\Controllers\Authentication;

use App\Enums\UserStatus;
use App\Http\Requests\Auth\RegisterRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

class RegisterController
{
    //
    public function index()
    {
        $withoutHeader = true;
        $withoutSlider = true;
        $withoutFooter = true;
        return view('auth.register',compact('withoutHeader','withoutSlider','withoutFooter'));
    }

    public function register(RegisterRegisterRequest $request)
    {
        $input = $request->validated();
        $input['password'] = Hash::make($input['password']);
        $input['status'] = UserStatus::ACTIVE;
        try {
            $userCreate = User::create($input);
        }catch (\Exception $exception) {
            return back()->withErrors([
                'general' => 'ثبت نام نا موفق بود دوباره تلاش کنید'
            ]);
        }
        Auth::guard('web')->login($userCreate);
        return redirect()->route('index');
    }
}
