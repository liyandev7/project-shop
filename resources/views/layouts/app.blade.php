<html lang="en">
@php
$setting = \App\Setting::findOrFail(1);
$categories = \App\Category::latest()
    ->take(6)
    ->get();
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>
    <link href="https://v1.fontapi.ir/css/Shabnam" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/website/css/respansive.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/website/css/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/website/css/owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/website/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->

    @yield('css')
</head>

<body>
    <a class="scrollTo scroll-To-top " href=".topbar-site "
        style="visibility: visible; transform: translateY(0px);"></a>
    <div class="bg-close">
    </div>
    <header>
        <div class="topbar-site ">
            <div class="container">
                <div class="row  d-flex justify-content-between align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="topbar-site_right d-flex  align-items-center">
                            <div class="tel_topbar-site  float-left ml-2">
                                <span>پشتیبانی</span>
                                <i class="fal fa-phone-alt"></i>
                                <a href="tel:{{ $setting->phone }}" class="mr-1">
                                    {{ $setting->phone }}
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <nav class="area_navbar">
            <div class="container container_nav">

                <div
                    class="row d-flex justify-content-between align-items-center navbarr justify-content-md-between ju">
                    <div class="col-4  col-md-3 d-block d-lg-none">
                        <div class="icon_meni_bar">
                            <a class="d-block d-xl-none"><i class="fas fa-bars mr-2"></i></a>
                        </div>
                    </div>
                    <div id="menu_mobile" class="menu_mobile ">
                        <div class="header_menu_mobile d-flex align-items-center">
                            <button type="button" class="close close_menu_mobile" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <img src="{{ $setting->logo }}" style="margin-top: 10px " />
                        </div>
                        <div class="area_menu_mobile menu-top-menu-container" id="accordian">
                            <ul class="menu-multi-level">
                                <li><a href="{{ route('website.home') }}">صفحه اصلی </a>
                                </li>

                                <li><a href="{{ route('home.products.index') }}">محصولات</a></li>
                                @can('show-panel-admin')
                                    <li><a href="{{ route('admin.home') }}">پنل مدیریت</a></li>

                                @endcan

                                <li><a href="{{ route('contact.view') }}">تماس با ما</a></li>
                                <li><a href="{{ route('about') }}"> درباره ما</a></li>
                                <li><a href="{{ route('blog.index') }}">مجله نامه</a></li>


                                @auth()
                                    <li><a href="/logout"> خروج</a></li>
                                @endauth

                            </ul>

                        </div>
                        @guest
                            <div class="footer_menu_mobile ">
                                <a href="{{ route('login') }}" class="btn btn-block btn_menu_mobile "><i
                                        class="fal fa-user ml-2"></i>
                                    ورود به سایت
                                </a>
                            </div>
                        @endguest

                    </div>
                    <div class="col-4  col-md-3  col-lg-9 col_menu_top">
                        <div class="arealogo float-right pl-3">
                            <a href="{{ route('website.home') }}" class="d-block d-lg-none"> <img
                                    src="{{ $setting->logo }}" style="margin-top: 10px" /></a>
                            <a href="{{ route('website.home') }}" class="d-none d-lg-block"> <img
                                    src="{{ $setting->logo }}" style="margin-top: 10px" /></a>
                        </div>
                        <div class="d-none d-lg-block  top_menu h-100 ">
                            <ul class="d-flex h-100 align-items-center">
                                <li><a href="{{ route('website.home') }}">صفحه اصلی</a>
                                </li>

                                <li><a href="{{ route('home.products.index') }}">محصولات</a></li>

                                @guest
                                    <li><a href="{{ route('login') }}">ورود به وب سایت</a></li>
                                    <li><a href="{{ route('register') }}">ثبت نام در وب سایت</a></li>
                                @endguest

                                @can('show-panel-admin')
                                    <li><a href="{{ route('admin.home') }}">پنل مدیریت</a></li>

                                @endcan

                                <li><a href="{{ route('contact.view') }}">تماس با ما</a></li>
                                <li><a href="{{ route('about') }}"> درباره ما</a></li>
                                <li><a href="{{ route('blog.index') }}">مجله نامه {{ env('APP_NAME') }}</a></li>



                            </ul>
                        </div>
                    </div>
                    <div class="col-4 col-md-3 col-lg-3">
                        <div class="widget_navbar d-flex justify-content-end align-items-center">
                            @auth
                                <div class="navbar-tool-account d-flex align-items-center">
                                    <a href="#">
                                        <img src="{{ auth()->user()->image }}" alt="">
                                    </a>
                                    <a href="#" class="link-name-user-account d-flex align-items-center">
                                        <div class="name-user-account d-flex flex-column align-items-center  mx-2">
                                            <span>سلام</span>
                                            {{ auth()->user()->name }}
                                        </div>
                                    </a>
                                    <ul class="dropdown-user-account nav nav-pills">

                                        <li> <a href="{{ route('profile.comments') }}" class="nav-link"
                                                id="comment-tab"><i class="fal fa-comment-alt ml-2"></i>دیدگاهها <span
                                                    class="dropdown-user-account-meta">5</span> </a>
                                        </li>

                                        <li> <a href="{{ route('profile.website.orders') }}" class="nav-link"
                                                id="orders-tab"><i class="fal fa-cart-arrow-down ml-2"></i>سفارش ها </a>
                                        </li>


                                        <li> <a href="{{ route('profile.website') }}" class="nav-link"
                                                id="infoprofile-tab"><i class="fal fa-user ml-2"></i>اطلاعات پروفایل </a>
                                        </li>


                                        <li> <a href="{{ route('profile.bank') }}" class="nav-link"
                                                id="setting-numberaccount-tab"><i
                                                    class="fal fa-credit-card-front ml-2"></i>تنطیمات شماره حساب </a>
                                        </li>




                                        <li> <a href="/logout"><i class="fal fa-sign-out-alt  ml-2"></i>خروج </a>
                                        </li>
                                    </ul>
                                </div>

                            @endauth


                            @auth()
                                <div class="border-right " style="height: 27px;"></div>
                                <div class="shooping-cat item_widget_navbar mr-4">
                                    <a href="{{ route('cart') }}">
                                        <i class="fal fa-shopping-cart"></i>
                                    </a>
                                </div>
                            @endauth

                            <!-- Modal -->

                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="area_navbar area_navbar_sticky">
            <div class="container container_nav">

                <div
                    class="row d-flex justify-content-between align-items-center navbarr justify-content-md-between ju">
                    <div class="col-4  col-md-3 d-block d-lg-none">
                        <div class="icon_meni_bar">
                            <a class="d-block d-xl-none"><i class="fas fa-bars mr-2"></i></a>
                        </div>
                    </div>
                    <div id="menu_mobile" class="menu_mobile ">
                        <div class="header_menu_mobile d-flex align-items-center">
                            <button type="button" class="close close_menu_mobile" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <img src="{{ $setting->logo }}" style="margin-top: 10px" />
                        </div>
                        <div class="area_menu_mobile menu-top-menu-container" id="accordian">
                            <ul class="menu-multi-level">


                                <li><a href="{{ route('website.home') }}">صفحه اصلی</a>
                                </li>

                                <li><a href="{{ route('home.products.index') }}">محصولات</a></li>



                                @can('show-panel-admin')
                                    <li><a href="{{ route('admin.home') }}">پنل مدیریت</a></li>

                                @endcan

                                <li><a href="{{ route('contact.view') }}">تماس با ما</a></li>
                                <li><a href="{{ route('about') }}"> درباره ما</a></li>
                                <li><a href="{{ route('blog.index') }}">مجله نامه {{ env('APP_NAME') }}</a></li>


                                @auth()
                                    <li><a href="/logout"> خروج</a></li>
                                @endauth
                            </ul>

                        </div>
                        <div class="footer_menu_mobile ">
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-block btn_menu_mobile "><i
                                        class="fal fa-user ml-2"></i>
                                    ورود به سایت
                                </a>
                            @endguest

                        </div>
                    </div>
                    <div class="col-4  col-md-3  col-lg-9 col_menu_top">
                        <div class="arealogo float-right pl-3">
                            <a href="{{ route('website.home') }}" class="d-block d-lg-none"> <img
                                    src="{{ $setting->logo }}" style="margin-top: 10px" /></a>
                            <a href="{{ route('website.home') }}" class="d-none d-lg-block"> <img
                                    src="{{ $setting->logo }}" style="margin-top: 10px" /></a>
                        </div>
                        <div class="d-none d-lg-block  top_menu h-100 ">
                            <ul class="d-flex h-100 align-items-center">
                                <li><a href="{{ route('website.home') }}">صفحه اصلی</a>
                                </li>

                                <li><a href="{{ route('home.products.index') }}">محصولات</a></li>

                                @guest
                                    <li><a href="{{ route('login') }}">ورود به وب سایت</a></li>
                                    <li><a href="{{ route('register') }}">ثبت نام در وب سایت</a></li>
                                @endguest

                                @can('show-panel-admin')
                                    <li><a href="{{ route('admin.home') }}">پنل مدیریت</a></li>

                                @endcan
                                <li><a href="{{ route('contact.view') }}">تماس با ما</a></li>
                                <li><a href="{{ route('about') }}"> درباره ما</a></li>
                                <li><a href="{{ route('blog.index') }}">مجله نامه {{ env('APP_NAME') }}</a></li>





                            </ul>
                        </div>


                    </div>

                    <div class="col-4 col-md-3 col-lg-3">
                        <div class="widget_navbar d-flex justify-content-end align-items-center">
                            @auth
                                <div class="navbar-tool-account d-flex align-items-center">
                                    <a href="#">
                                        <img src="{{ auth()->user()->image }}" alt="">
                                    </a>
                                    <a href="#" class="link-name-user-account d-flex align-items-center">
                                        <div class="name-user-account d-flex flex-column align-items-center  mx-2">
                                            <span>سلام</span>
                                            {{ auth()->user()->name }}
                                        </div>
                                    </a>
                                    <ul class="dropdown-user-account nav nav-pills">


                                        <li> <a href="{{ route('profile.comments') }}" class="nav-link"
                                                id="comment-tab"><i class="fal fa-comment-alt ml-2"></i>دیدگاهها <span
                                                    class="dropdown-user-account-meta">5</span> </a>
                                        </li>

                                        <li> <a href="{{ route('profile.website.orders') }}" class="nav-link"
                                                id="orders-tab"><i class="fal fa-cart-arrow-down ml-2"></i>سفارش ها </a>
                                        </li>


                                        <li> <a href="{{ route('profile.website') }}" class="nav-link"
                                                id="infoprofile-tab"><i class="fal fa-user ml-2"></i>اطلاعات پروفایل </a>
                                        </li>


                                        <li> <a href="{{ route('profile.bank') }}" class="nav-link"
                                                id="setting-numberaccount-tab"><i
                                                    class="fal fa-credit-card-front ml-2"></i>تنطیمات شماره حساب </a>
                                        </li>



                                        <li> <a href="/logout"><i class="fal fa-sign-out-alt  ml-2"></i>خروج </a>
                                        </li>
                                    </ul>
                                </div>

                            @endauth
                            @auth()
                                <div class="shooping-cat item_widget_navbar mr-4">
                                    <a href="{{ route('cart') }}">
                                        <i class="fal fa-shopping-cart"></i>

                                    </a>
                                </div>
                            @endauth



                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer>
        <div class="area_footer_top">
            <div class="container">
                <div class="row">
                    <div class=" col-sm-6 col-lg-4">
                        <div class="widget_footer">
                            <div class="title_widget_footer">
                                دسته بندی محصولات
                            </div>
                            <div class="contenet_widget_footer">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a href="{{ $category->url }}">
                                                {{ $category->title }}
                                            </a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4  mt-4 mt-sm-0">
                        <div class="widget_footer">
                            <div class="title_widget_footer">تماس با ما</div>
                            <div class="contenet_widget_footer">
                                <ul>
                                    <li>
                                        <span>آدرس : {{ $setting->address }}</span>
                                    </li>
                                    <li>
                                        <span> شماره تماس: {{ $setting->phone }}</span>
                                    </li>
                                    <li>
                                        <span> ایمیل: {{ $setting->email }}</span>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="area_footer_bottom">
            <div class="container">
                <div class="row area_element-multi">
                    <div class="col-6 col-md-4 col-xl-3 element-multi">
                        <div class="content-element-multi d-flex align-items-center  mb-3 ">
                            <div class="icon-element">
                                <i class="fal fa-truck"></i>
                            </div>
                            <div class="detail-element">
                                <h3>تحویل سریع و رایگان</h3>
                                <div class="text-multi-element">حمل و نقل رایگان در همه منظور</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-3 element-multi">
                        <div class="content-element-multi d-flex align-items-center  mb-3 ">
                            <div class="icon-element">
                                <i class="fal fa-user-headset"></i>
                            </div>
                            <div class="detail-element">
                                <h3>پشتیبانی آنلاین ۲۴/۷</h3>
                                <div class="text-multi-element">پشتیبانی آنلاین ۲۴ ساعت در روز</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-3 element-multi mt-4 mt-md-0">
                        <div class="content-element-multi d-flex align-items-center  mb-3 ">
                            <div class="icon-element">
                                <i class="fas fa-undo"></i>
                            </div>
                            <div class="detail-element">
                                <h3>بازگشت پول</h3>
                                <div class="text-multi-element">تضمین بازگشت به کمتر از ۷ روز</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-3 element-multi mt-4 mt-xl-0">
                        <div class="content-element-multi d-flex align-items-center  mb-3 ">
                            <div class="icon-element">
                                <i class="fal fa-lock-alt"></i>
                            </div>
                            <div class="detail-element ">
                                <h3>پرداخت امن</h3>
                                <div class="text-multi-element">امنیت کامل در پرداخت</div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr_footer_bottom ">

                <div class="row justify-content-between  pb-5 align-items-center">
                    <div class="col-12 col-lg-4 mt-4 mt-lg-0  order-2 order-lg-1">
                        <div class="copyright">
                            تمامی حقوق این وب سایت متعلق به شرکت <a href="http:://www.fararefah.com"></a>می باشد
                        </div>
                    </div>
                    {{-- <div class="col-12 col-lg-4 order-1 order-lg-2">
                        <div class="area_cartimg_footer float-right float-lg-left">
                            <img src="images/images13.png" style="width: 12rem;" />
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('/website/js/jquery-3.5.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/website/js/carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/website/js/main.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>

    @include('sweet::alert')
    @yield('script')
</body>

</html>

</html>
