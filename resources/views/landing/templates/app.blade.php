<!doctype html>
<html lang="en">
@php
$setting = \App\Setting::findOrFail(1);
$categories = \App\Category::latest()
    ->take(6)
    ->get();
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SEO Meta description -->
    <meta name="description" content="{{ $setting->description }}">
    <meta name="author" content="علی رضوی">

    <!--title-->
    <title> @yield('title')</title>

    <link href="https://v1.fontapi.ir/css/Shabnam" rel="stylesheet">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{ asset('/website-new/css/bootstrap.min.css') }}">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="{{ asset('/website-new/css/magnific-popup.css') }}">
    <!--Themify icon css-->
    <link rel="stylesheet" href="{{ asset('/website-new/css/themify-icons.css') }}">
    <!--animated css-->
    <link rel="stylesheet" href="{{ asset('/website-new/css/animate.min.css') }}">
    <!--ytplayer css-->
    <link rel="stylesheet" href="{{ asset('/website-new/css/jquery.mb.YTPlayer.min.css') }}">
    <!--Owl carousel css-->
    <link rel="stylesheet" href="{{ asset('/website-new/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/website-new/css/owl.theme.default.min.css') }}">
    <!--custom css-->
    <link rel="stylesheet" href="{{ asset('/website-new/css/style.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{ asset('/website-new/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @yield('css')
</head>

<body>

    <!--header section start-->
    @include('landing.partials.header')
    <!--header section end-->

    <!--body content wrap start-->
    @yield('content')
    <!--body content wrap end-->


    <!--footer section start-->
    <footer class="footer-section">

        <!--footer top start-->
        <div class="py-5 footer-top background-img-2"
            style="background: url('/website-new/img/footer-bg.png')no-repeat center top / cover">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="mb-3 col-lg-3 mb-lg-0">
                        <div class="text-white footer-nav-wrap">
                            <img src="{{ asset($setting->logo) }}" alt="footer logo" width="120"
                                class="mb-3 img-fluid">
                            <p>
                                {{ $setting->description }}
                            </p>

                            <div class="social-list-wrap">
                                <ul class="social-list list-inline list-unstyled">
                                    <li class="list-inline-item"><a href="{{ $setting->facebook }}" target="_blank"
                                            title="Facebook"><span class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="{{ $setting->twitter }}" target="_blank"
                                            title="Twitter"><span class="ti-twitter"></span></a></li>
                                    <li class="list-inline-item"><a href="{{ $setting->instagram }}" target="_blank"
                                            title="Instagram"><span class="ti-instagram"></span></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 ml-auto col-lg-3 mb-lg-0">
                        <div class="text-white footer-nav-wrap">
                            <h5 class="mb-3 text-white">سایر لینک ها</h5>
                            <ul class="list-unstyled">

                                <li class="mb-2"><a href="{{ route('contact') }}"></a></li>
                                <li class="mb-2"><a href="{{ route('about') }}"> درباره ما </a></li>
                                @auth()
                                    <li class="mb-2"><a href="{{ route('login') }}"> ورود به وب سایت</a></li>
                                    <li class="mb-2"><a href="{{ route('register') }}"> ثبت نام در وب سایت</a></li>
                                @endauth


                            </ul>
                        </div>
                    </div>
                    <div class="mb-4 ml-auto col-lg-3 mb-lg-0">
                        <div class="text-white footer-nav-wrap">
                            <h5 class="mb-3 text-white">پشتیبانی</h5>
                            <ul class="list-unstyled support-list">
                                <li class="mb-2 d-flex align-items-center"><span class="mr-2 ti-location-pin"></span>
                                    {{ $setting->address }}
                                </li>
                                <li class="mb-2 d-flex align-items-center"><span class="mr-2 ti-mobile"></span> <a
                                        href="tel:{{ $setting->phone }}"> {{ $setting->phone }}</a></li>
                                <li class="mb-2 d-flex align-items-center"><span class="mr-2 ti-email"></span><a
                                        href="mailto:{{ $setting->email }}"> {{ $setting->email }}</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="mb-4 ml-auto col-lg-3 mb-lg-0">
                        <div class="flex">
                            <a referrerpolicy="origin" target="_blank"
                                href="https://trustseal.enamad.ir/?id=218637&amp;Code=DmjLQp2sZgrnRCjT25Mq"><img
                                    referrerpolicy="origin"
                                    src="https://Trustseal.eNamad.ir/logo.aspx?id=218637&amp;Code=DmjLQp2sZgrnRCjT25Mq"
                                    alt="" style="cursor:pointer" id="DmjLQp2sZgrnRCjT25Mq"></a>
                            <img id='nbqergvjoeukjzpewlaojxlz' style='cursor:pointer'
                                onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=238741&p=uiwkxlaomcsijyoeaodsrfth", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                                alt='logo-samandehi'
                                src='https://logo.samandehi.ir/logo.aspx?id=238741&p=odrfqftiaqgwyndtshwlnbpd' />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--footer top end-->

        <!--footer copyright start-->
        <div class="pt-4 pb-4 footer-bottom gray-light-bg">
            <div class="container">
                <div class="text-center row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <p class="pb-0 mb-0 copyright-text">کلیه حقوق طراحی و ترجمه برای
                            <a href="/">onamira محفوظ است</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--footer copyright end-->
    </footer>
    <!--footer section end-->



    <!--jQuery-->
    <script src="{{ asset('/website-new/js/jquery-3.4.1.min.js') }}"></script>
    <!--Popper js-->
    <script src="{{ asset('/website-new/js/popper.min.js') }}"></script>
    <!--Bootstrap js-->
    <script src="{{ asset('/website-new/js/bootstrap.min.js') }}"></script>
    <!--Magnific popup js-->
    <script src="{{ asset('/website-new/js/jquery.magnific-popup.min.js') }}"></script>
    <!--jquery easing js-->
    <script src="{{ asset('/website-new/js/jquery.easing.min.js') }}"></script>
    <!--jquery ytplayer js-->
    <script src="{{ asset('/website-new/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!--wow js-->
    <script src="{{ asset('/website-new/js/wow.min.js') }}"></script>
    <!--owl carousel js-->
    <script src="{{ asset('/website-new/js/owl.carousel.min.js') }}"></script>
    <!--custom js-->
    <script src="{{ asset('/website-new/js/scripts.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    @include('sweet::alert')

</body>


</html>
