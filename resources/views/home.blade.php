@extends('layouts.app')

@section('title', 'صفحه اصلی وب سایت')

@section('content')

    <main class="content">
        <!-- Demo header-->
        <div class="tab_product_header">
            <div class="container pt-lg-5 ">
                <div class="row row_tab_product_header">
                    <div class="col-md-12 col-lg-3 col-xl-3 order-2  order-lg-1 ">

                        <!-- Tabs nav -->
                        <div class="nav  nav-pills nav-pills-custom p-1 mb-4 mb-lg-0 justify-content-center"
                            id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @isset($sliders)
                                @foreach ($sliders as $slider)
                                    <a class="nav-link my-2  shadow {{ $loop->iteration === 1 ? 'active' : '' }}"
                                        id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">
                                        <div class="tab_details_product d-flex align-items-center">
                                            <img src="{{ asset($slider->image) }}" />
                                            <div class="title_tab_product d-flex align-items-center">
                                                <div class="title_tab mx-3 mx-lg-2 mx-xl-3">
                                                    {{ $slider->title }}
                                                </div>
                                                <i class="fas fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach


                            @endisset


                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9 col-xl-9 order-1 order-lg-2 ">
                        <!-- Tabs content -->
                        <div class="tab-content" id="v-pills-tabContent">
                            @isset($sliders)

                                @foreach ($sliders as $slider)
                                    <div class="tab-pane fade shadow rounded show {{ $loop->iteration === 1 ? 'active' : '' }} "
                                        id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div class="row align-items-center">
                                            <div
                                                class="col-12 col-lg-6 order-1 mb-4 mb-lg-0 order-lg-2 d-flex justify-content-center">
                                                <img src="{{ asset($slider->image) }}" class="img-fluid" />
                                            </div>
                                            <div
                                                class="col-12 col-lg-6 order-2 mb-3 mb-lg-0 order-lg-1 d-flex justify-content-center">
                                                <div class="tab_panel_home text-center text-lg-right pr-lg-4 pr-xl-5">
                                                    <h2>
                                                        {{ $slider->title }}
                                                    </h2>
                                                    <p>
                                                        محصولی ارائه شده توسط وب سایت {{ env('APP_NAME') }}
                                                    </p>

                                                    <a href="{{ route('home.products.show', ['product' => $slider->id]) }}">قیمت:
                                                        {{ number_format($slider->price) }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset


                        </div>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
                <path fill="#fff" stroke="#fff"
                    d="M3000,0v185.4H0V0c496.4,115.6,996.4,173.4,1500,173.4S2503.6,115.6,3000,0z"></path>
            </svg>
        </div>

        <div class="container contain-sliderCategoryProduct mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel slider_category_product ">
                        @foreach ($services as $service)
                            <div class="item_slider_category_product">
                                <a href="#">

                                    <img src="{{ asset($service->icon) }}"
                                        style="width: 165px;height: 165px;margin: 0 auto" class="img-fluid" width="64"
                                        height="64" />
                                    <div class="title_category_slider">
                                        <h4 class="text-center">
                                            {{ $service->name }}
                                        </h4>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="container contain_product_new mb-5 mt-5 pb-2 pb-lg-3">
            <div class="row">
                <div class="col-12">
                    <div class="title_site">
                        <h2>محصولات جدید</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-sm-6  col-md-4 col-xl-3 mb_col_productNew d-flex justify-content-center">
                        <div class="product_cart">
                            <a href="{{ route('home.products.show', ['product' => $product->id]) }}"
                                class="card_product_img"><img src="{{ asset($product->image) }}" class="img-fluid" /></a>
                            <div class="body_card_product text-right">
                                <a href="{{ route('home.products.show', ['product' => $product->id]) }}">
                                    <h3>
                                        {{ $product->title }} </h3>
                                </a>
                                <div class="price_card_product"><span>
                                        {{ number_format($product->price) }}
                                        تومان</span></div>
                            </div>
                            <div class="card_footer_product d-flex justify-content-between align-items-center">

                                <div class="area_icon_cardFooter d-flex align-items-center">



                                    <a href="{{ route('home.products.show', ['product' => $product->id]) }}"><i
                                            class="fal fa-eye"></i><span class="tooltip-site">
                                            نمایش </span></a>
                                    <a href="#"><i class="fal fa-shopping-bag"></i><span class="tooltip-site">
                                            تعداد : {{ $product->count }}</span></a>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="row">
                <div class="col-12">
                    <div class="more_product d-flex justify-content-center align-items-center mt-3">
                        <a href="{{ route('home.products.index') }}">محصولات بیشتر</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <section class="area-video-single-page"> --}}
        {{-- <div class="container"> --}}
        {{-- <div class="row"> --}}
        {{-- <div class="col-12 col-md-6 d-flex align-items-center  order-2 order-md-1 "> --}}
        {{-- <div class="description-singleProduct"> --}}
        {{-- <h2 class="mb-3">محصول با بهترین کیفیت</h2> --}}
        {{-- <p> --}}
        {{-- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک --}}
        {{-- است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطر آنچنان که لازم است، و برای شرایط . --}}
        {{-- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک --}}
        {{-- است، چاپگرها و متون بلکه روزنامه و مجله در ستونو --}}
        {{-- </p> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div class="col-12 col-md-6 order-1 order-md-2 mb-4 mb-md-0 pb-2"> --}}
        {{-- <div class="box-video-productSingle thumbnail "> --}}
        {{-- <video id="video-gallery-button"> --}}
        {{-- <source src="video/bootstrap_v4_part35.mp4" type="video/mp4" id="mov_bbb"> --}}
        {{-- </video> --}}
        {{-- <a href="video/bootstrap_v4_part35.mp4" class="iconPlay-video-gallery" data-fancybox="video-gallery" data-title=""> --}}
        {{-- <i class="far fa-play"></i> --}}
        {{-- </a> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </section> --}}

        <div class="container contain_barand mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="title_site ">
                        <h2>برند های سایت</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($brands as $brand)
                    <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                        <a href="{{ $brand->url }}" class="d-block">
                            <div class="area_img_barand">
                                <img src="{{ asset($brand->image) }}" class="img1_barand img-fluid " />
                                <img src="{{ asset($brand->image) }}" class="img2_barand img-fluid " />
                            </div>
                        </a>
                    </div>

                @endforeach


            </div>
        </div>
        <div class="customers_comments ">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title_site ">
                            <h2>نظرات مشتریان</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel slider_customers_comments ">
                            @foreach ($comments as $comment)

                                <div class="item_sliderCustomersComments ">
                                    <div class="body-sliderCustomersComments border-bottom-1">
                                        <div
                                            class="title_item_sliderCustomersComments pt-3 d-flex align-items-center justify-content-between mb-2">
                                            <h4><a
                                                    href="{{ route('home.products.show', ['product' => $comment->commentable->id]) }}">
                                                    {{ $comment->commentable->title }}
                                                </a></h4>
                                            <a
                                                href="{{ route('home.products.show', ['product' => $comment->commentable->id]) }}"><img
                                                    src="{{ asset($comment->commentable->image) }}" /></a>
                                        </div>

                                        <p class="mt-4">
                                            {{ $comment->text }}
                                        </p>
                                    </div>
                                    <div class="footer-sliderCustomersComments ">
                                        <div class="porofile porofile_customers d-flex align-items-center">
                                            <img class="imgPorofile" src="{{ $comment->commentable->user->image }}" />
                                            <div class="porofileName">
                                                {{ $comment->commentable->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
