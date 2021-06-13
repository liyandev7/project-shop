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
                            <a class="nav-link my-2  shadow active" id="v-pills-home-tab" data-toggle="pill"
                                href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <div class="tab_details_product d-flex align-items-center">
                                    <img src="images/camera.jpg" />
                                    <div class="title_tab_product d-flex align-items-center">
                                        <div class="title_tab mx-3 mx-lg-2 mx-xl-3">دوربین امنیتی در فضای باز</div>
                                        <i class="fas fa-chevron-left"></i>
                                    </div>
                                </div>
                            </a>
                            <a class="nav-link my-2  shadow" id="v-pills-profile-tab" data-toggle="pill"
                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <div class="tab_details_product d-flex align-items-center">
                                    <img src="images/shoes21.jpg" />
                                    <div class="title_tab_product d-flex align-items-center">
                                        <div class="title_tab mx-3 mx-lg-2 mx-xl-3">کفش مناسب پیاده روی</div>
                                        <i class="fas fa-chevron-left"></i>
                                    </div>
                                </div>
                            </a>
                            <a class="nav-link my-2 shadow" id="v-pills-messages-tab" data-toggle="pill"
                                href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <div class="tab_details_product d-flex align-items-center">
                                    <img src="images/hedsetwireless.jpg" />
                                    <div class="title_tab_product d-flex align-items-center">
                                        <div class="title_tab mx-3 mx-lg-2  mx-xl-3">هدست بی سیم واقعیت مجازی</div>
                                        <i class="fas fa-chevron-left"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9 col-xl-9 order-1 order-lg-2 ">
                        <!-- Tabs content -->
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade shadow rounded show active " id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="row align-items-center">
                                    <div
                                        class="col-12 col-lg-6 order-1 mb-4 mb-lg-0 order-lg-2 d-flex justify-content-center">
                                        <img src="images/img13.png" class="img-fluid" />
                                    </div>
                                    <div
                                        class="col-12 col-lg-6 order-2 mb-3 mb-lg-0 order-lg-1 d-flex justify-content-center">
                                        <div class="tab_panel_home text-center text-lg-right pr-lg-4 pr-xl-5">
                                            <h2>دوربین امنیتی در فضای باز</h2>
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </p>
                                            <a href="#">قیمت: 2100000</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade shadow rounded " id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <div class="row align-items-center">
                                    <div
                                        class="col-12 col-lg-6 order-1 mb-3 mb-lg-0 order-lg-2 d-flex justify-content-center">
                                        <img src="images/img12.png" class="img-fluid" />
                                    </div>
                                    <div
                                        class="col-12 col-lg-6 order-2 mb-4 mb-lg-0 order-lg-1 d-flex justify-content-center">
                                        <div class="tab_panel_home text-center text-lg-right pr-lg-4 pr-xl-5">
                                            <h2>کفش مناسب پیاده روی</h2>
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </p>
                                            <a href="#">قیمت: 2100000</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade shadow rounded " id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                <div class="row align-items-center">
                                    <div
                                        class="col-12 col-lg-6 order-1 mb-3 mb-lg-0 order-lg-2 d-flex justify-content-center">
                                        <img src="images/img11.png" class="img-fluid" />
                                    </div>
                                    <div
                                        class="col-12 col-lg-6 order-2 mb-4 mb-lg-0 order-lg-1 d-flex justify-content-center">
                                        <div class="tab_panel_home text-center text-lg-right pr-lg-4 pr-xl-5">
                                            <h2>هدست بی سیم واقعیت مجازی</h2>
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </p>
                                            <a href="#">قیمت: 2100000</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
                <path fill="#fff" stroke="#fff"
                    d="M3000,0v185.4H0V0c496.4,115.6,996.4,173.4,1500,173.4S2503.6,115.6,3000,0z"></path>
            </svg>
        </div>

        <div class="container contain_product_new mb-5 pb-2 pb-lg-3">
            <div class="row">
                <div class="col-12">
                    <div class="title_site">
                        <h2>محصولات جدید</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6  col-md-4 col-xl-3 mb_col_productNew d-flex justify-content-center">
                    <div class="product_cart">
                        <a href="#" class="card_product_img"><img src="images/shoes541.jpg" class="img-fluid" /></a>
                        <div class="body_card_product text-right">
                            <a href="#">
                                <h3>کفش اسپرت </h3>
                            </a>
                            <div class="price_card_product"> <del class="ml-1">150000تومان</del><span> 120000
                                    تومان</span></div>
                        </div>
                        <div class="card_footer_product d-flex justify-content-between align-items-center">
                            <div class="star_rating">
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon "><i class="far fa-star"></i></span>
                                <span class="star-icon"><i class="far fa-star"></i></span>
                            </div>
                            <div class="area_icon_cardFooter d-flex align-items-center">
                                <a href="#" class="border-left"><i class="fal fa-cart-plus"></i><span class="tooltip-site">
                                        سبد خرید </span></a>
                                <a href="#"><i class="fal fa-heart"></i><span class="tooltip-site"> علاقه مندی
                                        ها</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb_col_productNew d-flex justify-content-center">
                    <div class="product_cart">
                        <a href="#" class="card_product_img"><img src="images/kolah757.jpg" class="img-fluid" /></a>
                        <div class="body_card_product text-right">
                            <a href="#">
                                <h3>کلاه آفتاب گیر </h3>
                            </a>
                            <div class="price_card_product"> <del class="ml-1">15000تومان</del><span> 12000 تومان</span>
                            </div>
                        </div>
                        <div class="card_footer_product d-flex justify-content-between align-items-center">
                            <div class="star_rating">
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon"><i class="far fa-star"></i></span>
                            </div>
                            <div class="area_icon_cardFooter d-flex align-items-center">
                                <a href="#" class="border-left"><i class="fal fa-cart-plus"></i><span class="tooltip-site">
                                        سبد خرید </span></a>
                                <a href="#"><i class="fal fa-heart"></i><span class="tooltip-site"> علاقه مندی
                                        ها</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb_col_productNew d-flex justify-content-center">
                    <div class="product_cart">
                        <a href="#" class="card_product_img"><img src="images/hansfari78.jpg" class="img-fluid" /></a>
                        <div class="body_card_product text-right">
                            <a href="#">
                                <h3>هدفون بی سیم </h3>
                            </a>
                            <div class="price_card_product"> <del class="ml-1">250000تومان</del><span> 120000
                                    تومان</span>
                            </div>
                        </div>
                        <div class="card_footer_product d-flex justify-content-between align-items-center">
                            <div class="star_rating">
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon "><i class="far fa-star"></i></span>
                                <span class="star-icon"><i class="far fa-star"></i></span>
                            </div>
                            <div class="area_icon_cardFooter d-flex align-items-center">
                                <a href="#" class="border-left"><i class="fal fa-cart-plus"></i><span class="tooltip-site">
                                        سبد خرید </span></a>
                                <a href="#"><i class="fal fa-heart"></i><span class="tooltip-site"> علاقه مندی
                                        ها</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb_col_productNew d-flex justify-content-center">
                    <div class="product_cart">
                        <a href="#" class="card_product_img"><img src="images/pirhan587.jpg" class="img-fluid" /></a>
                        <div class="body_card_product text-right">
                            <a href="#">
                                <h3>پیراهن مردانه</h3>
                            </a>
                            <div class="price_card_product"> <del class="ml-1">120000تومان</del><span> 150000
                                    تومان</span>
                            </div>
                        </div>
                        <div class="card_footer_product d-flex justify-content-between align-items-center">
                            <div class="star_rating">
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                            </div>
                            <div class="area_icon_cardFooter d-flex align-items-center">
                                <a href="#" class="border-left"><i class="fal fa-cart-plus"></i><span class="tooltip-site">
                                        سبد خرید </span></a>
                                <a href="#"><i class="fal fa-heart"></i><span class="tooltip-site"> علاقه مندی
                                        ها</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-sm-6 col-md-4 col-xl-3 mb_col_productNew d-flex justify-content-center">
                    <div class="product_cart">
                        <a href="#" class="card_product_img"><img src="images/spiker75.jpg" class="img-fluid" /></a>
                        <div class="body_card_product text-right">
                            <a href="#">
                                <h3>اسپیکر با کنترل صدا </h3>
                            </a>
                            <div class="price_card_product"> <del class="ml-1">150000تومان</del><span> 120000
                                    تومان</span></div>
                        </div>
                        <div class="card_footer_product d-flex justify-content-between align-items-center">
                            <div class="star_rating">
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon"><i class="far fa-star"></i></span>
                            </div>
                            <div class="area_icon_cardFooter d-flex align-items-center">
                                <a href="#" class="border-left"><i class="fal fa-cart-plus"></i><span class="tooltip-site">
                                        سبد خرید </span></a>
                                <a href="#"><i class="fal fa-heart"></i><span class="tooltip-site"> علاقه مندی
                                        ها</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb_col_productNew d-flex justify-content-center">
                    <div class="product_cart">
                        <a href="#" class="card_product_img"><img src="images/kif75.jpg" class="img-fluid" /></a>
                        <div class="body_card_product text-right">
                            <a href="#">
                                <h3>کوله پشتی </h3>
                            </a>
                            <div class="price_card_product"> <del class="ml-1">15000تومان</del><span> 12000 تومان</span>
                            </div>
                        </div>
                        <div class="card_footer_product d-flex justify-content-between align-items-center">
                            <div class="star_rating">
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon "><i class="far fa-star"></i></span>
                            </div>
                            <div class="area_icon_cardFooter d-flex align-items-center">
                                <a href="#" class="border-left"><i class="fal fa-cart-plus"></i><span class="tooltip-site">
                                        سبد خرید </span></a>
                                <a href="#"><i class="fal fa-heart"></i><span class="tooltip-site"> علاقه مندی
                                        ها</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb_col_productNew d-flex justify-content-center">
                    <div class="product_cart">
                        <a href="#" class="card_product_img"><img src="images/kolah785.jpg" class="img-fluid" /></a>
                        <div class="body_card_product text-right">
                            <a href="#">
                                <h3>کلاه دخترانه </h3>
                            </a>
                            <div class="price_card_product"> <del class="ml-1">250000تومان</del><span> 120000
                                    تومان</span>
                            </div>
                        </div>
                        <div class="card_footer_product d-flex justify-content-between align-items-center">
                            <div class="star_rating">
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon "><i class="far fa-star"></i></span>
                                <span class="star-icon "><i class="far fa-star"></i></span>
                                <span class="star-icon"><i class="far fa-star"></i></span>
                            </div>
                            <div class="area_icon_cardFooter d-flex align-items-center">
                                <a href="#" class="border-left"><i class="fal fa-cart-plus"></i><span class="tooltip-site">
                                        سبد خرید </span></a>
                                <a href="#"><i class="fal fa-heart"></i><span class="tooltip-site"> علاقه مندی
                                        ها</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4  col-xl-3 mb_col_productNew d-flex justify-content-center">
                    <div class="product_cart">
                        <a href="#" class="card_product_img"><img src="images/camera7857.jpg" class="img-fluid" /></a>
                        <div class="body_card_product text-right">
                            <a href="#">
                                <h3>دوربین</h3>
                            </a>
                            <div class="price_card_product"> <del class="ml-1">12000000تومان</del><span> 1500000
                                    تومان</span>
                            </div>
                        </div>
                        <div class="card_footer_product d-flex justify-content-between align-items-center">
                            <div class="star_rating">
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                <span class="star-icon"><i class="far fa-star"></i></span>
                            </div>
                            <div class="area_icon_cardFooter d-flex align-items-center">
                                <a href="#" class="border-left"><i class="fal fa-cart-plus"></i><span class="tooltip-site">
                                        سبد خرید </span></a>
                                <a href="#"><i class="fal fa-heart"></i><span class="tooltip-site"> علاقه مندی
                                        ها</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="more_product d-flex justify-content-center align-items-center mt-3">
                        <a href="#">محصولات بیشتر</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container contain_barand mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="title_site ">
                        <h2>برند های سایت</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/adidas1.png" class="img1_barand img-fluid " />
                            <img src="images/adidas2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/brooks1.png" class="img1_barand img-fluid " />
                            <img src="images/brooks2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/fila1.png" class="img1_barand img-fluid " />
                            <img src="images/fila2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/amazon1.png" class="img1_barand img-fluid " />
                            <img src="images/amazon2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/fila1.png" class="img1_barand img-fluid " />
                            <img src="images/fila2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/canon1.png" class="img1_barand img-fluid " />
                            <img src="images/canon2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/sennheiser1.png" class="img1_barand img-fluid " />
                            <img src="images/sennheiser2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/puma1.png" class="img1_barand img-fluid " />
                            <img src="images/poma2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/rayban1.png" class="img1_barand img-fluid " />
                            <img src="images/rayban2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/fila1.png" class="img1_barand img-fluid " />
                            <img src="images/fila2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/brooks1.png" class="img1_barand img-fluid " />
                            <img src="images/brooks2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 mb_col_barand">
                    <a href="#" class="d-block">
                        <div class="area_img_barand">
                            <img src="images/amazon1.png" class="img1_barand img-fluid " />
                            <img src="images/amazon2.png" class="img2_barand img-fluid " />
                        </div>
                    </a>
                </div>
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
                            <div class="item_sliderCustomersComments ">
                                <div class="body-sliderCustomersComments border-bottom-1">
                                    <div
                                        class="title_item_sliderCustomersComments pt-3 d-flex align-items-center justify-content-between mb-2">
                                        <h4><a href="#">کفش ورزشی مناسب دویدن</a></h4>
                                        <a href="#"><img src="images/shoes21.jpg" /></a>
                                    </div>
                                    <div class="star_rating mb-2">
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon"><i class="far fa-star"></i></span>
                                    </div>
                                    <p>
                                        بسیار جنس خوب و زیبا و راحت است خریدش رو توصیه می کنم
                                    </p>
                                </div>
                                <div class="footer-sliderCustomersComments ">
                                    <div class="porofile porofile_customers d-flex align-items-center">
                                        <img class="imgPorofile" src="images/castomer87.jpg" />
                                        <div class="porofileName">فاطمه حمزه عوفی</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item_sliderCustomersComments2 ">
                                <a href="#">
                                    <div class="body-sliderCustomersComments2">
                                        <span><i class="fab fa-instagram"></i></span>
                                        <img src="images/image1.jpg">
                                    </div>
                                    <div class="footer-sliderCustomersComments ">
                                        <div class="porofile porofile_customers d-flex align-items-center">
                                            <img class="imgPorofile" src="images/castomer87.jpg" />
                                            <div class="porofileName">فاطمه حمزه عوفی</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item_sliderCustomersComments ">
                                <div class="body-sliderCustomersComments border-bottom-1">
                                    <div
                                        class="title_item_sliderCustomersComments pt-3  d-flex align-items-center justify-content-between mb-2">
                                        <h4><a href="#">هدست بی سیم</a></h4>
                                        <a href="#"><img src="images/hedfon32.jpg" /></a>
                                    </div>
                                    <div class="star_rating mb-2">
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon "><i class="far fa-star"></i></span>
                                        <span class="star-icon"><i class="far fa-star"></i></span>
                                    </div>
                                    <p>
                                        با استفاده از این هدست آرامش خواهید داشت که مطلبی که میشنوید مزاحمت صوتی برای
                                        اطرافیان ندارد.

                                    </p>
                                </div>
                                <div class="footer-sliderCustomersComments ">
                                    <div class="porofile porofile_customers d-flex align-items-center">
                                        <img class="imgPorofile" src="images/castomer9787.jpg" />
                                        <div class="porofileName">فاطمه حمزه عوفی</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item_sliderCustomersComments2 ">
                                <a href="#">
                                    <div class="body-sliderCustomersComments2">
                                        <span><i class="fab fa-instagram"></i></span>
                                        <img src="images/images2.jpg" />
                                    </div>
                                    <div class="footer-sliderCustomersComments ">
                                        <div class="porofile porofile_customers d-flex align-items-center">
                                            <img class="imgPorofile" src="images/castomerse5262.jpg" />
                                            <div class="porofileName">حسین حمزه عوفی</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item_sliderCustomersComments ">
                                <div class="body-sliderCustomersComments border-bottom-1">
                                    <div
                                        class="title_item_sliderCustomersComments pt-3  d-flex align-items-center justify-content-between mb-2">
                                        <h4><a href="#">گرمکن طرح دار دولایه</a></h4>
                                        <a href="#"><img src="images/boloz541.jpg" /></a>
                                    </div>
                                    <div class="star_rating mb-2">
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                        <span class="star-icon star-icon-active"><i class="far fa-star"></i></span>
                                    </div>
                                    <p>
                                        هم جنسش خوبه وهم قشنگه و خوش دوخت ،تقریبا گرمه و برای زمستون خوبه ، منکه واقعا
                                        راضی ام
                                    </p>
                                </div>
                                <div class="footer-sliderCustomersComments ">
                                    <div class="porofile porofile_customers d-flex align-items-center">
                                        <img class="imgPorofile" src="images/castomer87.jpg" />
                                        <div class="porofileName">فاطمه حمزه عوفی</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item_sliderCustomersComments2 ">
                                <a href="#">
                                    <div class="body-sliderCustomersComments2">
                                        <span><i class="fab fa-instagram"></i></span>
                                        <img src="images/images3.jpg">
                                    </div>
                                    <div class="footer-sliderCustomersComments ">
                                        <div class="porofile porofile_customers d-flex align-items-center">
                                            <img class="imgPorofile" src="images/castomer545.jpg" />
                                            <div class="porofileName">فاطمه حمزه عوفی</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
