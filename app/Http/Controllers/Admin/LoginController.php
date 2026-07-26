<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginStoreRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function login()
    {
        $withoutRaw = true;
        return view('admin.login',compact('withoutRaw'));
    }

    public function store(LoginStoreRequest $request)
    {
        $input = $request->validated();
        $admin = Admin::query()
            ->where('user_name','=',$input['user_name'])
            ->first();
        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.');
    }
}
