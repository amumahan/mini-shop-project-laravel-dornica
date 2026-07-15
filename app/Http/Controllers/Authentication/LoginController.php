<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Requests\Auth\LoginLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class LoginController
{
    //
    public function index()
    {

        $withoutHeader = true;
        $withoutSlider = true;
        $withoutFooter = true;
        return view('auth.login',compact('withoutHeader','withoutSlider','withoutFooter'));
    }

    public function login(LoginLoginRequest $request)
    {
        try {
            $input = $request->validated();
            $user = User::query()
                ->where('mobile','=',$input['mobile'])
                ->first();
            if (!$user){
                return back()->withErrors([
                    'login_error' => 'کاربر یافت نشد'
                ]);
            }
            $passwordChek = Hash::check($input['password'],$user['password']);
            if (!$passwordChek){
                return back()->withErrors([
                    'login_error' => 'کاربر یافت نشد'
                ]);
            }
            Auth::guard('web')->login($user);
            return redirect()->route('index');
        }catch (Exception $exception) {
            return back()->withErrors([
                'login_error' => 'مشکلی پیش امده دوباره تلاش کنید'
            ]);
        }
    }
}
