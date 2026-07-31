<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Slider;
use Illuminate\Http\Request;
use Psy\Util\Str;

class SliderController
{
    public function index()
    {
        return view('admin.slider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $image = $request->file('image');

        // ساخت نام جدید
        $fileName = \Illuminate\Support\Str::uuid() . '.' . $image->getClientOriginalExtension();

        // مسیر ذخیره
        $path = $image->storeAs(
            'sliders',
            $fileName,
            'public'
        );


        // ذخیره اطلاعات فایل
        $file = File::create([
            'name' => $fileName,
            'extension' => $image->getClientOriginalExtension(),
            'original_name' => $image->getClientOriginalName(),
            'size' => $image->getSize(),
            'path' => $path,
        ]);


        // ذخیره اسلایدر
        Slider::create([
            'file_id' => $file->id
        ]);


        return redirect()
            ->back()
            ->with('success','اسلایدر با موفقیت ثبت شد');
    }
}
