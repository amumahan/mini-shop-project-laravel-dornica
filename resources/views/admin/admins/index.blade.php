@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <!-- Filter + Search -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-3">
                            <form method="GET" action="http://127.0.0.1:8000/admin/admins">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                    <!-- Left: Add Admin + Sort -->
                                    <div class="d-flex flex-wrap gap-1 project-list-main align-items-center">
                                        <div class="d-flex me-2">
                                            <input class="form-control me-2" type="search" name="search"
                                                   placeholder="جستجو ادمین" value=""
                                                   aria-label="جستجو">
                                            <button class="btn btn-light" type="submit">جستجو</button>
                                        </div>

                                        <select id="choices-single-default" class="form-control" name="sort">
                                            <option value="">مرتب‌سازی بر اساس</option>
                                            <option
                                                value="name_asc" >
                                                نام (الف - ی)
                                            </option>
                                            <option
                                                value="name_desc" >
                                                نام (ی - الف)
                                            </option>
                                            <option value="email" >
                                                ایمیل
                                            </option>
                                            <option value="newest" >
                                                جدیدترین
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Right: Search -->
                                    <div class="d-flex" role="search">
                                        <a href="http://127.0.0.1:8000/admin/admins/create" class="btn btn-primary me-2">
                                            <i class="ri-add-line me-1 fw-medium align-middle"></i>ایجاد مدیر
                                        </a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th><input class="form-check-input check-all" type="checkbox" id="all-admins"></th>
                                    <th>تصویر</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>وضعیت</th>
                                    <th>ادمین ارشد</th>
                                    <th>آخرین ورود</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="2">
                                    </td>
                                    <td>
                                            <span class="avatar avatar-md avatar-square bg-light">
                                                <img src="/assets/admin/images/faces/DefaultAvatar.jpg"
                                                     class="w-100 h-100" alt="روت">
                                            </span>
                                    </td>
                                    <td>روت</td>
                                    <td>محمدی</td>
                                    <td>root</td>
                                    <td>root@gmail.com</td>
                                    <td>
                                            <span
                                                class="badge bg-primary-transparent">
                                                فعال
                                            </span>
                                    </td>
                                    <td>
                                            <span
                                                class="badge bg-success-transparent">
                                                بله
                                            </span>
                                    </td>
                                    <td>-</td>
                                    <td>15 مرداد 1404 - 13:34</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="http://127.0.0.1:8000/admin/admins/2/edit"
                                               class="btn btn-secondary-light btn-icon btn-sm" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="http://127.0.0.1:8000/admin/admins/2"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این ادمین مطمئن هستید؟')">
                                                <input type="hidden" name="_token" value="G3faz5te2OVLWMw1sn2U47RRUgVWPGJznIyOIEMM" autocomplete="off">                                                    <input type="hidden" name="_method" value="DELETE">                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger-light">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="1">
                                    </td>
                                    <td>
                                            <span class="avatar avatar-md avatar-square bg-light">
                                                <img src="/assets/admin/images/faces/DefaultAvatar.jpg"
                                                     class="w-100 h-100" alt="مرتضی">
                                            </span>
                                    </td>
                                    <td>مرتضی</td>
                                    <td>مهدی زاده</td>
                                    <td>noise</td>
                                    <td>mrking0151@gmail.com</td>
                                    <td>
                                            <span
                                                class="badge bg-primary-transparent">
                                                فعال
                                            </span>
                                    </td>
                                    <td>
                                            <span
                                                class="badge bg-success-transparent">
                                                بله
                                            </span>
                                    </td>
                                    <td>-</td>
                                    <td>15 مرداد 1404 - 09:49</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="http://127.0.0.1:8000/admin/admins/1/edit"
                                               class="btn btn-secondary-light btn-icon btn-sm" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="http://127.0.0.1:8000/admin/admins/1"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این ادمین مطمئن هستید؟')">
                                                <input type="hidden" name="_token" value="G3faz5te2OVLWMw1sn2U47RRUgVWPGJznIyOIEMM" autocomplete="off">                                                    <input type="hidden" name="_method" value="DELETE">                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger-light">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div>
                <ul class="pagination justify-content-end mt-3">
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0);">قبلی</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="http://127.0.0.1:8000/admin/admins?page=1">1</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0);">بعدی</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
@endsection
