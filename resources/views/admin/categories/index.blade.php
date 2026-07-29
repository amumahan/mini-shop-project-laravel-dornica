@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <!-- Filters -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-3">
                            <form method="GET" action="http://127.0.0.1:8000/admin/categories">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                    <!-- Sort Dropdown -->
                                    <div class="d-flex flex-wrap gap-1 align-items-center">
                                        <div class="d-flex me-2">
                                            <input class="form-control me-2" type="search" name="search"
                                                   placeholder="جستجو دسته‌بندی" value="">
                                            <button class="btn btn-light" type="submit">جستجو</button>
                                        </div>

                                        <select id="choices-single-default" class="form-control" name="sort">
                                            <option value="">مرتب‌سازی بر اساس</option>
                                            <option
                                                value="date_desc" >
                                                جدیدترین
                                            </option>
                                            <option
                                                value="date_asc" >
                                                قدیمی‌ترین
                                            </option>
                                            <option
                                                value="name_asc" >
                                                نام (الف تا ی)
                                            </option>
                                            <option
                                                value="name_desc" >
                                                نام (ی تا الف)
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Search -->
                                    <div class="d-flex" role="search">
                                        <a href="{{route('admin.category.create')}}" class="btn btn-primary me-2">
                                            <i class="ri-add-line me-1 fw-medium align-middle"></i>
                                            ایجاد دسته بندی
                                        </a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories Table -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th>دسته‌بندی</th>
                                    <th>توضیحات</th>
                                    <th>تعداد محصولات</th>
                                    <th scope="col">وضعیت</th>

                                    <th>تاریخ ایجاد</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 name-limit">
                                                        <a href="{{route('admin.category.show',$category->id)}}">{{$category->name}}</a>
                                                    </p>
                                                    <p class="fs-12 text-muted mb-0 ">{{$category->id}}#</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="description-limit">{{$category->name}}</td>
                                        <td>{{count($category->products)}}</td>
                                        <td>
                                        <span
                                            class="badge bg-success-transparent">
                                            @if($category->is_active == 1)
                                                فعال
                                            @else
                                                غیر فعال
                                            @endif
                                        </span>
                                        </td>
                                        <td>{{$category->created_at->toJalali()->format('H:i Y/m/d')}}</td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="{{route('admin.category.show', $category->id)}}"
                                                   class="btn btn-primary-light btn-icon btn-sm"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                <a href="{{route('admin.category.edit', $category->id)}}"
                                                   class="btn btn-secondary-light btn-icon btn-sm"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <form action="{{route('admin.category.delete', $category->id)}}"
                                                      method="POST"
                                                      onsubmit="return confirm('آیا از حذف این دسته‌بندی مطمئن هستید؟')">
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
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0);">قبلی</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="http://127.0.0.1:8000/admin/categories?page=1">1</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0);">بعدی</a>
                </li>
            </ul>
            {{$categories->links()}}
        </div>
    </div>
@endsection
