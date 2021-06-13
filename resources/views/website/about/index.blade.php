@extends('layouts.app')

@section('title','درباره ما')

@section('content')
    <div class="content">
        <section class="area-our-mission">
            <div class="container pt-5 pt-lg-3  pt-xl-5 mt-2">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-12 col-lg-5 ">
                        <div class="box-our-mission">
                            <h1 class="mb-2">اهداف و ماموریت ما</h1>
                            <h2 class="mb-4">چگونه به شرکت های دیگر کمک می کنیم تا رشد کنند</h2>
                            <div class="mb-5">
                                <p class="text-our-mission">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                                    گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و
                                    برای شرایط .
                                </p>
                            </div>
                            <div class="d-flex align-items-center"> <a href="video/bootstrap_v4_part35.mp4"
                                                                       data-fancybox="video-gallery" data-title="" class="iconPlay-video-gallery ml-3"> <i
                                        class="far fa-play"></i></a>
                                <span>ما را بهتر بشناسید</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block  col-7 area-card-our-mission ">
                        <div class="bg-card-our-mission"> <img src="{{asset('/website/images/bg-about.svg')}}" class="h-100 w-100" />
                        </div>
                        <div class="row h-100 card-our-mission ">
                            <div class="col-4 px-2">
                                <a href="#"
                                   class="card card-body d-flex justify-content-center align-items-center h-100">
                                    <i class="far fa-paint-brush-alt text-primary"></i>
                                    <h3>طراحی گرافیک</h3>
                                </a>
                            </div>
                            <div class="col-4 px-2 d-flex flex-column ">
                                <a href="#"
                                   class="card card-body  flex-column align-items-center justify-content-center mb-3">
                                    <i class="fal fa-user-headset text-warning"></i>
                                    <h3>پشتیبانی فوق العاده</h3>
                                </a>
                                <a href="#"
                                   class="card card-body d-flex  flex-column align-items-center justify-content-center">
                                    <i class="fab fa-sketch text-secondary"></i>
                                    <h3>ایده خلاقانه</h3>
                                </a>
                            </div>
                            <div class="col-4 px-2 d-flex flex-column">
                                <a href="#"
                                   class="card card-body d-flex  flex-column align-items-center justify-content-center mb-3">
                                    <i class="fal fa-pen-nib text-danger"></i>
                                    <h3>طراحی لوگو</h3>
                                </a>
                                <a href="#"
                                   class="card card-body d-flex  flex-column align-items-center justify-content-center">
                                    <i class="far fa-external-link text-info"></i>
                                    <h3>مارکتینگ</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="area-counterUp ">
            <div class="container">
                <div class="row">
                    <div
                        class="col-sm-6 col-md-3 counter  d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-4">
                        <h2 class="timer count-title count-number mb-1" data-to="200" data-speed="1500"></h2>
                        <p class="count-text mb-3">سفارش</p>
                        <i class="fa fa-code fa-2x"></i>
                    </div>
                    <div
                        class="col-sm-6  col-md-3  counter d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-4">
                        <h2 class="timer count-title count-number mb-1" data-to="150" data-speed="1500"></h2>
                        <p class="count-text mb-3">بازخود مثبت</p>
                        <i class="fa fa-coffee fa-2x"></i>
                    </div>
                    <div
                        class="col-sm-6  col-md-3  counter d-flex justify-content-center align-items-center flex-column mb-4">
                        <h2 class="timer count-title count-number mb-1" data-to="200" data-speed="1500"></h2>
                        <p class="count-text mb-3">مشتری راضی داریم</p>
                        <i class="fa fa-lightbulb-o fa-2x"></i>
                    </div>
                    <div
                        class="col-sm-6  col-md-3  counter d-flex justify-content-center align-items-center flex-column mb-4">
                        <h2 class="timer count-title count-number mb-1" data-to="3" data-speed="1500"></h2>
                        <p class="count-text mb-3">سال تجربه</p>
                        <i class="fa fa-bug fa-2x"></i>
                    </div>
                </div>
            </div>
        </section>
        <section class=" mb-5 pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title_site mb-4 mb-sm-5">
                            <h2>ما با شرکت های برتر جهان کار می کنیم</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($brands as $brand)
                    <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                        <a href="#" class="d-block">
                            <div class="area_img_barand">
                                <img src="{{asset($brand->image)}}" class="img1_barand img-fluid " />
                                <img src="{{asset($brand->image)}}" class="img2_barand img-fluid " />
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>

@endsection
