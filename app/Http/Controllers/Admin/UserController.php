<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class UserController
{
    public function index()
    {
        return view('admin.user.index');
    }
}
