@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">

            <div class="row">
                <div class="col-xl-12">

                    <form
                        action="http://127.0.0.1:8000/admin/users/3/update"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <input type="hidden" name="_token" value="VofHLLAqMD1Drv23vG8MgkBtFMjNl7t6G8gfBpxL" autocomplete="off">                        <input type="hidden" name="_method" value="PUT">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">ویرایش کاربر</div>
                            </div>

                            <div class="card-body">


                                <!-- User Fields -->
                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <label class="form-label">نام</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="first_name"
                                            value="مهدی"
                                            placeholder="نام را وارد کنید"
                                        >
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">نام خانوادگی</label>
                                        <input type="text" class="form-control" name="last_name"
                                               value="هاشمی"
                                               placeholder="نام خانوادگی را وارد کنید">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">ایمیل</label>
                                        <input type="email" class="form-control" name="email"
                                               value="sirj3x@gmail.com"
                                               placeholder="ایمیل را وارد کنید">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">شماره موبایل</label>
                                        <input type="text" class="form-control" name="mobile"
                                               value="09359953331"
                                               placeholder="شماره موبایل را وارد کنید">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">رمز عبور (در صورت تغییر)</label>
                                        <input type="text" class="form-control" name="password"
                                               placeholder="رمز عبور را وارد کنید">
                                    </div>
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
