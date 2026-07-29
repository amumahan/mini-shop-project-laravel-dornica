@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <div class="row">
                <div class="col-xl-12">

                    <!-- Create Category Form -->
                    <form action="{{route('admin.category.store')}}" method="POST">
                        @csrf
                        <div class="card custom-card mb-4">
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
                                    @error('name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
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
