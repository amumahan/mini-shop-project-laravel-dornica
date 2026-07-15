@extends('layouts.app')
@section('content')
    <main class="container relative">

        <div class="flex flex-col lg:flex-row gap-x-8 mt-10">
            <!-- SIDE MENU -->
            @include('account.layouts.box')

            <!-- TOP FILTER BOX & PRODUCT & PAGINATION -->
            @yield('account-content')
        </div>
    </main>
@endsection
