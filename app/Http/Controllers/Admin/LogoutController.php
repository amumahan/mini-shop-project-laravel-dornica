<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController
{
    public function logout()
    {
        session()->regenerate();
        Auth::guard('admin')->logout();
        return redirect()->route('admin.');
    }
}
