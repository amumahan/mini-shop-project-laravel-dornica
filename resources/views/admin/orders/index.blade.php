@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">

            <!-- Filters -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-3">
                            <form method="GET" action="http://127.0.0.1:8000/admin/orders">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                    <!-- Sort Dropdown -->
                                    <div class="d-flex flex-wrap gap-1 align-items-center">
                                        <select id="choices-single-default" class="form-control" name="sort">
                                            <option value="">مرتب‌سازی بر اساس</option>
                                            <option
                                                value="created_at_desc" selected>
                                                جدیدترین
                                            </option>
                                            <option
                                                value="created_at_asc" >
                                                قدیمی‌ترین
                                            </option>
                                            <option
                                                value="price_high" >
                                                مبلغ (زیاد به کم)
                                            </option>
                                            <option
                                                value="price_low" >
                                                مبلغ (کم به زیاد)
                                            </option>
                                            <option value="status" >
                                                وضعیت
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Search -->
                                    <div class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" name="search"
                                               placeholder="جستجو سفارش"
                                               value=""
                                        >
                                        <button class="btn btn-light" type="submit">جستجو</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-hover">
                                <thead>
                                <tr>
                                    <th>شناسه</th>
                                    <th>مشتری</th>
                                    <th>مبلغ</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ثبت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div>
                                                <span class="fw-semibold d-block">#2</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        مهدی هاشمی
                                    </td>
                                    <td>
                                        79,000
                                        تومان
                                    </td>
                                    <td>
                                        <span class="text-info">در حال پردازش</span>
                                    </td>
                                    <td>11:34 1404/07/24</td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="http://127.0.0.1:8000/admin/orders/2/show"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="http://127.0.0.1:8000/admin/orders/2/edit"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <a href="javascript:void(0);"
                                               onclick="if(confirm('آیا از حذف این سفارش مطمئن هستید؟')) { document.getElementById('delete-form-2').submit(); }"
                                               class="btn btn-pink-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                            <form id="delete-form-2"
                                                  action="http://127.0.0.1:8000/admin/orders/2/delete"
                                                  method="POST"
                                                  style="display:none;"
                                            >
                                                <input type="hidden" name="_token" value="VofHLLAqMD1Drv23vG8MgkBtFMjNl7t6G8gfBpxL" autocomplete="off">                                                    <input type="hidden" name="_method" value="DELETE">                                                </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div>
                                                <span class="fw-semibold d-block">#1</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        سارا محمدی
                                    </td>
                                    <td>
                                        580,000
                                        تومان
                                    </td>
                                    <td>
                                        <span class="text-info">در حال پردازش</span>
                                    </td>
                                    <td>16:13 1404/07/13</td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="http://127.0.0.1:8000/admin/orders/1/show"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="http://127.0.0.1:8000/admin/orders/1/edit"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <a href="javascript:void(0);"
                                               onclick="if(confirm('آیا از حذف این سفارش مطمئن هستید؟')) { document.getElementById('delete-form-1').submit(); }"
                                               class="btn btn-pink-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                            <form id="delete-form-1"
                                                  action="http://127.0.0.1:8000/admin/orders/1/delete"
                                                  method="POST"
                                                  style="display:none;"
                                            >
                                                <input type="hidden" name="_token" value="VofHLLAqMD1Drv23vG8MgkBtFMjNl7t6G8gfBpxL" autocomplete="off">                                                    <input type="hidden" name="_method" value="DELETE">                                                </form>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
