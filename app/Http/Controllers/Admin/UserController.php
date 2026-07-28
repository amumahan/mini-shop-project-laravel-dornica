<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index',compact('users'));
    }

    public function show($userId)
    {
        $user = User::query()
            ->where('id','=',$userId)
            ->first();
        $ordersUser = Order::query()
            ->where('user_id','=',$userId)
            ->limit(5)
            ->paginate();
        return view('admin.user.show',compact('user','ordersUser'));
    }

    public function edit($userId)
    {
        $user = User::query()
            ->where('id','=',$userId)
            ->first();
        return view('admin.user.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request , $userId)
    {
        $user = User::query()
            ->where('id','=',$userId)
            ->first();
        $input = $request->validated();
        if ($input['password']) {
            if (!Hash::check($input['password'], $user['password'])) {
                $inputs['password'] = Hash::make($input['password']);
            }
        }else{
            unset($input['password']);
        }
        $user->fill($input);
        if (!$user->isDirty()) {
            return back();
        }
        $user->update($input);
        return redirect()->back();
    }

    public function delete($userId)
    {
        User::query()
            ->where('id','=',$userId)
            ->delete();
        return redirect()->back()->withErrors('delete', 'کاربر حذف شد');
    }
}
