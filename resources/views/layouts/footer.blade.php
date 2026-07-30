
    <footer class="md:container my-12">
        <div class=" relative w-full bg-gray-900 dark:bg-gray-800 text-white rounded-2xl p-4 lg:p-9">
            <div class="flex items-start flex-col gap-x-7 lg:gap-x-10 gap-y-10 lg:flex-row flex-wrap">
                <div class="flex-[2] w-full">
                    <h2 class="footer_title">
                        درباره
                        {{$setting->name}}
                    </h2>
                    <p class="leading-8 text-gray-400 mb-5">
                        {{$setting->description}}
                    </p>
                </div>
                <div class="flex-1 flex flex-col w-full lg:w-auto">
                    <h2 class="footer_title">دسترسی سریع</h2>
                    <div class="flex gap-x-10 child:space-y-2 child:text-gray-400">
                        <ul class="child-hover:text-blue-500 child:transition-all">
                            <li>
                                <a href="{{route('index')}}">صفحه اصلی</a>
                            </li>
                            <li>
                                <a href="{{route('product.index')}}">فروشگاه</a>
                            </li>
                            <li>
                                <a href="{{route('auth.login.index')}}">ورود به حساب کاربری</a>
                            </li>
                            <li>
                                <a href="{{route('auth.register.index')}}">ثبت نام</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-[1.5] w-full">
                    <h2 class="footer_title">تماس با ما</h2>
                    <ul
                        class="flex flex-col child:flex child:text-gray-400 child:items-center child:justify-between gap-y-5">
                        <li>
                            <p>شماره تماس :</p>
                            <p dir="ltr">{{$setting->mobile}}</p>
                        </li>
                        <li>
                            <p>آدرس ایمیل :</p>
                            <p>{{$setting->email}}</p>
                        </li>
                        <li>
                            <p>آدرس :</p>
                            <p>{{$setting->address}}</p>
                        </li>
                    </ul>
                </div>
                <div
                    class="flex-1 w-full md:w-1/6 flex flex-col items-end justify-end ml-5 md:ml-0 md:mr-5">


                    <!-- GO TOP -->
                    <a href="#"
                       class="ring-2 ring-gray-400 text-gray-300 w-32 rounded-lg text-sm flex-center gap-x-2 py-1.5 px-2 mt-10 ">
                        بازگشت به بالا
                        <svg class="size-4 rotate-180">
                            <use href="#chevron"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <p class="text-center text-sm my-4 text-gray-400">Copyright © 2025 Dornica. All rights reserved</p>
    </footer>

