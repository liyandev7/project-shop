@extends('landing.templates.app')

@section('title', 'وب سایت onamira')

@section('content')
    @php
    $setting = \App\Setting::findOrFail(1);
    @endphp
    <div class="main">

        <!--hero section start-->
        <section class="hero-section background-img"
            style="background: url('/website-new/img/hero-bg-2.jpg')no-repeat center center / cover">
            <div class="video-section-wrap">
                <div class="background-video-overly ptb-100">
                    <div class="player"
                        data-property="{videoURL:'https://www.youtube.com/watch?v=gOqlwlQjVis',containment:'.video-section-wrap', quality:'highres', autoPlay:true, showControls: false, startAt:0, mute:true, opacity: 1}">
                    </div>
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-8 col-lg-7">
                                <div class="hero-content-left text-white text-center mt-5 ptb-100">
                                    <h1 class="text-white">
                                        رهایی از ترافیک با اسکوتر هوشمند رها
                                    </h1>
                                    <p class="lead">
                                        اسکوتر های هوشمند رها محصولی از خانواده دانش بنیان اونامیرا و در حوزه وسایل حمل و نقل با انرژی های پاک میباشند.این محصول بومی را میتوانید با شرایط ویژه از ما خرید کنید
                                    </p>

                                    <a href="{{ route('contact') }}" class="btn google-play-btn">تماس با ما</a>
                                </div>
                            </div>
                        </div>
                        <!--clients logo start-->
                        <div class="row justify-content-between">
                            <div class="col-md-12">
                                <div class="client-section-wrap d-flex flex-row align-items-center">
                                    <p class="lead mr-5 mb-0 text-white">شرکای تجاری ما :</p>

                                    <ul class="list-inline justify-content-between">
                                        @foreach ($brands as $brand)
                                            <li class="list-inline-item"><img src="{{ asset($brand->image) }}" width="85"
                                                    alt="client" class="img-fluid"></li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--clients logo end-->
                    </div>
                </div>
            </div>
        </section>
        <!--hero section end-->

        <!--promo section start-->
        <section class="promo-section ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <div class="section-heading mb-5">
                            <span class="badge badge-success badge-pill">اونامیرا</span>
                            <h5 class="h5 mt-3 mb-6" style="line-height: 45px;
            text-align: justify;">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                باشد. </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-lg-3 col-sm-6 mb-lg-0">
                            <div class="card single-promo-card single-promo-hover mb-lg-0">
                                <div class="card-body">
                                    <div class="pb-2">
                                        <span class="ti-credit-card icon-md color-secondary"></span>
                                    </div>
                                    <div class="pt-2 pb-3">
                                        <h5> {{ $service->name }}</h5>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--promo section end-->


        <!--about us section start-->
        <section id="about" class="about-us ptb-100 gray-light-bg">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6">
                        <div class="about-content-left section-heading">
                            <h2>
                                محوریت فعالیت های اونامیرا
                            </h2>
                            <p>
                                ما در اونامیرا در ساخت و توسعه محصولاتی در حوزه های حمل و نقل الکترونیکی،حمل و نقل هوایی و پردازش تصویر و صوت فعالیت داریم.تیم های ما از ترکیب افراد مسن و با تجربه در کنار جوانان جویای نام و خلاق تشکیل شدند زیرا بر این باوریم با استفاده از تخصص و تجربه در کنار شور جوانی ، خلاقیت و ریسک پذیری میتوانیم قله های افتخار را گام به گام فتح کنیم.
                                و همیشه پذیرای تمامی افرادی هستیم که علاقه مند هستند در حوزه های زیر فعالیت نمایند
                            </p>

                            <div class="single-feature mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="ti-vector rounded mr-3 icon icon-color-1"></span>
                                    <h5 class="mb-0">-سیستم های پردازش صوت \ تصویر</h5>
                                </div>

                            </div>
                            <div class="single-feature mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="ti-vector rounded mr-3 icon icon-color-1"></span>
                                    <h5 class="mb-0">--طراحی داخلی و خارجی ، ماکت سازی خودرو ، موتور و..</h5>
                                </div>

                            </div>
                            <div class="single-feature mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="ti-dashboard rounded mr-3 icon icon-color-2"></span>
                                    <h5 class="mb-0"> -هوش مصنوعی \ فراگیری ماشین</h5>
                                </div>

                            </div>

                            <div class="single-feature mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="ti-alarm-clock rounded mr-3 icon icon-color-3"></span>
                                    <h5 class="mb-0">-طراحی و ساخت مدارو موتور های الکترونیکی</h5>
                                </div>

                            </div>
                            <div class="single-feature mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="ti-alarm-clock rounded mr-3 icon icon-color-3"></span>
                                    <h5 class="mb-0">-طراحان صنعتی مسلط به solid work</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-content-right">
                            <img src="{{ asset('/website-new/img/about-img.png') }}" alt="about us" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--about us section end-->

        <!--our video promo section start-->
        <section class="video-promo ptb-100 background-img"
            style="background: url('img/video-bg.jpg')no-repeat center center / cover">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="video-promo-content mt-4 text-center">
                            <a href="https://www.youtube.com/watch?v=9No-FiEInLA"
                                class="popup-youtube video-play-icon d-inline-block"><span
                                    class="ti-control-play"></span></a>
                            <h5 class="mt-4 text-white">مشاهده تیزر تبلیغاتی از کارکرد </h5>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--our video promo section end-->

        <!--features section start-->
        <div id="features" class="feature-section ptb-100 gray-light-bg">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="section-heading text-center mb-5">
                            <h2>
                                {{ $product->title }} <br>

                            </h2>
                            <p>محصولی نوین و منحصربفرد در خدمت شما برای رها شدن از شر ترافیک و پیاده روی های طاقت فرسا </p>

                        </div>
                    </div>
                </div>

                <!--feature new style start-->
                <div class="row row-grid align-items-center">
                    <div class="col-lg-4">
                        <div class="d-flex align-items-start mb-5">
                            <div class="pr-4">
                                <div class="icon icon-shape icon-color-1 rounded-circle">
                                    <span class="ti-face-smile"></span>
                                </div>
                            </div>
                            <div class="icon-text">
                                <h5> با خیال راحت ۴۰ کیلومتر بران</h5>
                                <p class="mb-0"> با اسکوتر رها شما میتوانید با دوساعت شارژ دستگاه مسافتی به طول ۴۰ کیلومتر را بپیمایید. </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-5">
                            <div class="pr-4">
                                <div class="icon icon-shape icon-color-2 rounded-circle">
                                    <span class="ti-vector"></span>
                                </div>
                            </div>
                            <div class="icon-text">
                                <h5>  سرعت و شتابی همچون قالیچه سلیمان</h5>
                                <p class="mb-0">سرعت اسکوتر های رها تا سقف ۳۰ کیلومتر بر ساعت میباشد و به دلیل برقی بودن آن شتابی شگفت انگیز دارد </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="pr-4">
                                <div class="icon icon-shape icon-color-3 rounded-circle">
                                    <span class="ti-headphone-alt"></span>
                                </div>
                            </div>
                            <div class="icon-text">
                                <h5>  محکم و پایدار</h5>
                                <p class="mb-0"> اسکلت این اسکوتر ها ساخته شده از آلیاژ آلومنیومی مقاومی میباشد که تا ۲۰۰ کیلوگرم وزن را میتوانید تحمل کند </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="position-relative">
                            <img alt="Image placeholder" src="{{ $product->image }}" class="img-center img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-start mb-5">
                            <div class="pr-4">
                                <div class="icon icon-shape icon-color-4 rounded-circle">
                                    <span class="ti-layout-media-right"></span>
                                </div>
                            </div>
                            <div class="icon-text">
                                <h5> محکم و پایدار</h5>
                                <p class="mb-0"> اسکلت این اسکوتر ها ساخته شده از آلیاژ آلومنیومی مقاومی میباشد که تا ۲۰۰ کیلوگرم وزن را میتوانید تحمل کند </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-5">
                            <div class="pr-4">
                                <div class="icon icon-shape icon-color-5 rounded-circle">
                                    <span class="ti-layout-cta-right"></span>
                                </div>
                            </div>
                            <div class="icon-text">
                                <h5>  ایمنی هوشمند</h5>
                                <p class="mb-0">اسکوتر های رها دارای یک ترمز ABS در قسمت جلو و یک ترمز دیسکی در عقب میباشد که هنگام ترمز به صورت هوشمند میزان ترمز را کنترل و ایمنی سفر شما را تضمین میکند</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="pr-4">
                                <div class="icon icon-shape icon-color-6 rounded-circle">
                                    <span class="ti-palette"></span>
                                </div>
                            </div>
                            <div class="icon-text">
                                <h5> در تاریکی شب روشنگر راه شماییم</h5>
                                <p class="mb-0">اسکوتر های رها دارای یک چراغ پر نور در قسمت فرمان میباشد که راه را برای شما نشان میدهد در ضمن چراغ ایمنی عقب را دست کم نگیرید ؛کوچک ولی پرنور و موثر. </p>
                            </div>
                        </div>


                    </div>
                    <div class="d-flex align-items-center m-auto">
                        <div class="download-btn mt-5">
                            <a href="{{ route('home.products.show', ['product' => $product->id]) }}"
                                class="btn google-play-btn mr-3 "></span>
                                خرید انلاین وارد شوید
                            </a>

                        </div>
                    </div>
                </div>
                <!--feature new style end-->
            </div>
        </div>
        <!--features section end-->




        <!--testimonial section start-->
        <section class="testimonial-section gray-light-bg ptb-100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                        <div class="section-heading mb-5">
                            <h2>نظرات خریداران <br><span>کسانی که از محصول ما استفاده کردند چه نظر دارند</span>
                            </h2>
                            <p class="lead">
                                شما نیز میتوانید پس از خرید محصول  و در هنگام تحویل به ماموران تحویل ما نظرات را بیان کنید و یا داخل سایت در پنل شخصیتان نظرتان را بنویسید تا در تارنمای ما نشان داده شود
                            </p>


                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="owl-carousel owl-theme client-testimonial arrow-indicator">
                            @foreach ($comments as $comment)
                                <div class="item">
                                    <div class="testimonial-quote-wrap">
                                        <div class="media author-info mb-3">
                                            <div class="author-img mr-3">
                                                <img src="{{ $comment->commentable->user->image }}" alt="client"
                                                    class="img-fluid rounded-circle">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mb-0"> {{ $comment->commentable->user->name }} </h5>
                                                <span><a
                                                        href="{{ route('home.products.show', ['product' => $comment->commentable->id]) }}">
                                                        {{ $comment->commentable->title }}
                                                    </a></span>
                                            </div>
                                        </div>
                                        <div class="client-say">
                                            <p> <img src="{{ asset('/website-new/img/quote.png') }}" alt="quote"
                                                    class="img-fluid">
                                                {{ $comment->text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--testimonial section end-->

        <!--contact us section start-->
        <section id="contact" class="contact-us ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="section-heading">
                            <h3>تماس با ما</h3>
                            <p>نظرات،انتقادات و پیشنهادات خود را برای ما ارسال نماییم.لازم به ذکر است تیم توسعه ما پذیرای ایده ها و خلاقیت های شما هستند. </p>
                        </div>
                        <div class="footer-address">
                            <h6><strong>آدرس دفتر مرکزی:</strong></h6>
                            <p>
                                {{ $setting->address }}
                            </p>
                            <ul>
                                <li><span>تلفن: {{ $setting->phone }}</span></li>
                                <li><span>ایمیل: <a
                                            href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form action="{{ route('contact') }}" method="POST" id=" contactForm1" class="contact-us-form"
                            novalidate="novalidate">
                            @csrf
                            <h5>مکاتبه با ما</h5>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" value="{{ old('name') }}" class="form-control" name="name"
                                            placeholder="نام و نام خانوادگی" required="required">
                                    </div>


                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="email" value="{{ old('email') }}" class="form-control" name="email"
                                            placeholder="آدرس ایمیل" required="required">
                                    </div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                                            id="phone" placeholder="شماره تماس">
                                    </div>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" value="" size="40" class="form-control"
                                            id="subject" placeholder="موضوع مکاتبه">
                                    </div>
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control" rows="7" cols="25"
                                            placeholder="متن پیام"></textarea>
                                    </div>

                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="btn solid-btn" id="btnتماس با ماUs">
                                        ارسال پیام
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </section>
        <!--contact us section end-->

        <!--client section start-->
        <section class="client-section gray-light-bg ptb-100">
            <div class="container">
                <!--clients logo start-->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="section-heading text-center mb-5">
                            <h2>شرکای تجاری ما</h2>
                            <p class="lead">
                                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme clients-carousel dot-indicator">
                            @foreach ($brands as $brand)
                                <div class="item single-client">
                                    <img src="{{ asset($brand->image) }}" alt="client logo" class="client-img">
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <!--clients logo end-->
            </div>
        </section>
        <!--client section start-->

    </div>

@endsection
