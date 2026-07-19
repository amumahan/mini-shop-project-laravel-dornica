@extends('layouts.app')
@section('content')
    <main class="container">
        <!-- Breadcrumb -->
        <nav class="flex mt-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="http://127.0.0.1:8000"
                       class="inline-flex items-center text-sm gap-x-1  text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="size-4 mb-0.5">
                            <use href="#home"/>
                        </svg>
                        صفحه اصلی
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm  text-gray-500 md:ms-2 dark:text-gray-400">فروشگاه</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row gap-4 mt-5">
            <!-- SIDE FILTER BOX -->
            @include('product.layouts.box')
            <!-- TOP FILTER BOX & PRODUCT & PAGINATION -->
            <div class="lg:w-3/4">

                <!-- TOP FILTER BOX -->
                <div class="hidden lg:flex items-center justify-between  mb-6">
                    <div class="flex items-center gap-x-5">
                        <div class="flex items-center gap-x-2">
                            <svg class="size-6 text-gray-400">
                                <use href="#sort-list"></use>
                            </svg>
                            <h2 class="font-DanaDemiBold text-gray-400">مرتب سازی :</h2>
                        </div>


                        <div class="flex">

                            <ul
                                class="flex items-center gap-x-1 lg:gap-x-4 child:transition-all child:cursor-pointer child:rounded-lg child:px-1 child:py-1 child:text-sm child:lg:text-base">
                                <li
                                    class="text-blue-500"
                                >
                                    <a href="http://127.0.0.1:8000/products?sort=newest">جدید ترین</a>
                                </li>
                                <li
                                    class="text-gray-400"
                                >
                                    <a href="http://127.0.0.1:8000/products?sort=best_selling">پرفروش ترین</a>
                                </li>
                                <li
                                    class="text-gray-400"
                                >
                                    <a href="http://127.0.0.1:8000/products?sort=lowest">ارزان ترین</a>
                                </li>
                                <li
                                    class="text-gray-400"
                                >
                                    <a href="http://127.0.0.1:8000/products?sort=highest">گران ترین</a>
                                </li>
                            </ul>

                        </div>

                    </div>
                    <span class="text-sm text-gray-400 end">
                        2
                        کالا
                    </span>
                </div>
                <!-- PRODUCTS -->
                @yield('product-content')
                <!-- PAGINATION -->
                <div class="mt-10 w-full">

                </div>
            </div>
        </div>
    </main>
@endsection

