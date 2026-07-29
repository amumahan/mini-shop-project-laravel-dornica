<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController
{
    public function index()
    {
        $admins = Admin::get();
        return view('admin.admins.index',compact('admins'));
    }

    public function edit($adminId)
    {
        $admin = Admin::find($adminId);
        return view('admin.admins.edit',compact('admin'));
    }

    public function update(AdminUpdateRequest $request,$adminId)
    {
        $input = $request->validated();
        $admin = Admin::find($adminId);
        if (!$input['password'] == null) {
            $passwordCheck = Hash::check($input['password'] , $admin->password);
            if (!$passwordCheck) {
                $input['password'] = Hash::make($input['password']);
            }
        }else{
            unset($input['password']);
        }
        $admin->update($input);
        return back();
    }

    public function delete($adminId)
    {
        Admin::find($adminId)
        ->delete();
        return back();
    }
}
