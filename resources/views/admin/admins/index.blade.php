@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <!-- Filter + Search -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-3">
                            <form method="GET" action="">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                    <!-- Left: Add Admin + Sort -->
                                    <div class="d-flex flex-wrap gap-1 project-list-main align-items-center">
                                        <div class="d-flex me-2">
                                            <input class="form-control me-2" type="search" name="search"
                                                   placeholder="جستجو ادمین" value="{{request()->input('search')}}"
                                                   aria-label="جستجو">
                                            <button class="btn btn-light" type="submit">جستجو</button>
                                        </div>

                                        <select id="choices-single-default" class="form-control" name="sort">
                                            <option value="">مرتب‌سازی بر اساس</option>
                                            <option
                                                value="name_asc" @selected(request()->input('sort') == 'name_asc')>
                                                نام (الف - ی)
                                            </option>
                                            <option
                                                value="name_desc" @selected(request()->input('sort') == 'name_desc')>
                                                نام (ی - الف)
                                            </option>
                                            <option value="email" @selected(request()->input('sort') == 'email')>
                                                ایمیل
                                            </option>
                                            <option value="newest" @selected(request()->missing('sort') || request()->input('sort') == 'newest')>
                                                جدیدترین
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Right: Search -->
                                    <div class="d-flex" role="search">
                                        <a href="{{route('admin.admin.create')}}" class="btn btn-primary me-2">
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
                                    <th>نام و نام خانوادگی</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>وضعیت</th>
                                    <th>آخرین ورود</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $admin)
                                    <tr>

                                        <td>{{$admin->full_name}}</td>
                                        <td>{{$admin->user_name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>
                                            <span
                                                class="badge bg-primary-transparent">
                                                @switch($admin->status)
                                                    @case(\App\Enums\AdminStatus::INACTIVE)
                                                        <span style="color: gray">غیر فعال</span>
                                                        @break
                                                    @case(\App\Enums\AdminStatus::ACTIVE)
                                                        <span style="color: yellowgreen">فعال</span>
                                                        @break
                                                    @case(\App\Enums\AdminStatus::PENDING)
                                                        <span style="color: green">در انتظار تایید</span>
                                                        @break
                                                @endswitch
                                            </span>
                                        </td>
                                        <td>{{$admin->updated_at->toJalali()->format('H:i Y/m/d')}}</td>
                                        <td>{{$admin->created_at->toJalali()->format('H:i Y/m/d')}}</td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="{{route('admin.admin.edit',$admin->id)}}"
                                                   class="btn btn-secondary-light btn-icon btn-sm" title="ویرایش">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <form action="{{route('admin.admin.delete',$admin->id)}}"
                                                      method="POST"
                                                      onsubmit="return confirm('آیا از حذف این ادمین مطمئن هستید؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger-light">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            {{$admins->links()}}
        </div>
    </div>
@endsection
