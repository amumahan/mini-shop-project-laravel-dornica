@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <div class="row">
                <div class="col-xl-12">

                    <!-- Edit Category Form -->
                    <form action="{{route('admin.category.update',$category->id)}}" method="Post">
                        @csrf
                        @method('PUT')
                        <div class="card custom-card mb-4">
                            <div class="card-header">
                                <div class="card-title">ویرایش دسته‌بندی</div>
                            </div>

                            <div class="card-body">

                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <label class="form-label">نام دسته‌بندی</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{$category->name}}"
                                               placeholder="نام دسته‌بندی را وارد کنید">
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
