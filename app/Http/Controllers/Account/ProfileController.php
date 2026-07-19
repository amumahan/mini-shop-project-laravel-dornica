<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\ProfileEditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController
{
    //
    public function index()
    {
        $withoutSlider = true;
        $withoutFooter = true;
        $user = auth()->user();
        return view('account.profile', compact('withoutSlider', 'withoutFooter', 'user'));
    }

    public function edit(ProfileEditRequest $request)
    {
        $inputs = $request->validated();
        $user = auth()->user();
        if ($inputs['password']) {
            if (!Hash::check($inputs['password'], $user['password'])) {
                $inputs['password'] = Hash::make($inputs['password']);
            }
        }else{
            unset($inputs['password']);
        }
        $user->fill($inputs);
        if (!$user->isDirty()) {
            return back();
        }
        $user->update($inputs);
        return back()->with('update', 'اطلاعات آپدیت شد.');
    }
}
