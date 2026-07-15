<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController
{
    //
    public function logout()
    {
        session()->regenerate();
        Auth::guard('web')->logout();
        return redirect()->route('auth.login.index');
    }
}
