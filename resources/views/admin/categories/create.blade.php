@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <div class="row">
                <div class="col-xl-12">

                    <!-- Create Category Form -->
                    <form action="http://127.0.0.1:8000/admin/categories/store" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="G3faz5te2OVLWMw1sn2U47RRUgVWPGJznIyOIEMM" autocomplete="off">                        <div class="card custom-card mb-4">
                            <div class="card-header">
                                <div class="card-title">ایجاد دسته‌بندی</div>
                            </div>

                            <div class="card-body">

                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <label class="form-label">نام دسته‌بندی</label>
                                        <input type="text" class="form-control" name="name" value=""
                                               placeholder="نام دسته‌بندی را وارد کنید">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">نامک (Slug)</label>
                                        <input type="text" class="form-control" name="slug" value=""
                                               placeholder="نامک را وارد کنید">
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="form-label">توضیحات</label>
                                        <textarea class="form-control" name="description" rows="3"
                                                  placeholder="توضیحات دسته‌بندی را وارد کنید"></textarea>
                                    </div>
                                </div>

                                <div class="card-avatar mt-3" style="min-height: unset">
                                    <div class="text-center">
                                        <label class="form-label d-block mb-2 fw-semibold">تصویر دسته بندی</label>
                                        <label class="avatar-picker" id="avatarPreview"
                                               style="background-image: url('/assets/admin/images/faces/DefaultAvatar.jpg')">
                                            <input type="file" name="images[]" accept="image/*" multiple
                                                   onchange="previewAvatar(this)">
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">ایجاد دسته‌بندی</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
