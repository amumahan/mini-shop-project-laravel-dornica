@extends('admin.layouts.app')

@section('content')
    @if(session('success'))
        <span style="color: red">{{session('success')}}</span>
    @endif

    <div class="main-content app-content">
        <div class="container-fluid pt-4">

            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        ایجاد اسلایدر
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.slider.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                تصویر اسلایدر
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control">
                        </div>


                        <button type="submit" class="btn btn-primary">
                            ذخیره
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
