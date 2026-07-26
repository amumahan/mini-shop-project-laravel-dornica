@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <div class="row">
                <div class="col-xl-12">
                    <form action="http://127.0.0.1:8000/admin/admins/store" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="G3faz5te2OVLWMw1sn2U47RRUgVWPGJznIyOIEMM" autocomplete="off">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">ایجاد مدیر</div>
                            </div>

                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <label class="form-label">نام</label>
                                        <input type="text" class="form-control" name="first_name"
                                               value="" placeholder="نام را وارد کنید">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">نام خانوادگی</label>
                                        <input type="text" class="form-control" name="last_name"
                                               value="" placeholder="نام خانوادگی را وارد کنید">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">نام کاربری</label>
                                        <input type="text" class="form-control" name="username"
                                               value="" placeholder="نام کاربری">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">ایمیل</label>
                                        <input type="email" class="form-control" name="email" value=""
                                               placeholder="ایمیل را وارد کنید">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">رمز عبور</label>
                                        <input type="password" class="form-control" name="password"
                                               placeholder="رمز عبور را وارد کنید">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">نوع مدیر</label>
                                        <select class="form-control" name="is_super">
                                            <option value="1" >مدیر کل
                                            </option>
                                            <option value="0" selected>عادی</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">وضعیت</label>
                                        <select class="form-control" name="is_active">
                                            <option value="1" selected>فعال
                                            </option>
                                            <option value="0" selected>غیرفعال
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-avatar">
                                    <div class="text-center">
                                        <label class="form-label d-block fw-semibold">تصویر پروفایل</label>
                                        <label class="avatar-picker" id="avatarPreview"
                                               style="background-image: url('/assets/admin/images/faces/DefaultAvatar.jpg')">
                                            <input type="file" name="images[]" accept="image/*" multiple
                                                   onchange="previewAvatar(this)">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
