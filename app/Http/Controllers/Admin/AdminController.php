<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;

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

    public function update($adminId)
    {

    }

    public function delete($adminId)
    {

    }
}
