@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <div class="row">
                <div class="col-xl-12">
                    <form action="{{route('admin.admin.update',$admin->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">ویرایش مدیر</div>
                            </div>

                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <label class="form-label">نام و نام خانوادگی</label>
                                        <input type="text" class="form-control" name="full_name"
                                               value="{{$admin->full_name}}"
                                               placeholder="نام را وارد کنید">
                                        @error('full_name')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">نام کاربری</label>
                                        <input type="text" class="form-control" name="user_name"
                                               value="{{$admin->user_name}}" placeholder="نام کاربری">
                                        @error('user_name')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">ایمیل</label>
                                        <input type="email" class="form-control" name="email"
                                               value="{{$admin->email}}"
                                               placeholder="ایمیل را وارد کنید">
                                        @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">رمز عبور (در صورت تغییر)</label>
                                        <input type="password" class="form-control" name="password"
                                               placeholder="رمز عبور را وارد کنید">
                                        @error('password')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">وضعیت</label>
                                        <select class="form-control" name="status">
                                            <option value="{{\App\Enums\AdminStatus::ACTIVE}}" selected>
                                                فعال
                                            </option>
                                            <option value="{{\App\Enums\AdminStatus::INACTIVE}}" >
                                                غیرفعال
                                            </option>
                                            <option value="{{\App\Enums\AdminStatus::PENDING}}" >
                                                درانتظار تایید
                                            </option>
                                        </select>
                                    </div>
                                </div>


                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
