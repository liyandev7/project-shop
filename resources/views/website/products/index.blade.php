@extends('layouts.app')

@section('title', 'صفحه اصلی وب سایت')

@section('content')
    <div class="content shop sidebar left-sidebar">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 py-5 pl-lg-5">
                        <div class="area-content-bySidebar">
                            <nav aria-label="breadcrumb" class="mb-4 pb-2">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('website.home') }}">خانه</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('home.products.index') }}">فروشگاه</a>
                                    </li>

                                </ol>
                            </nav>
                            {{-- <div
                                class="area-select-sort-NumberProductPerPage d-flex justify-content-between align-items-center mb-3">
                                <div class="box-select-sort d-flex align-items-center justify-content-end mb-4">
                                    <select class="custom-select ml-3" id="select-sort">
                                        <option selected=""> براساس محبوبیت</option>
                                        <option value="1">براساس جدید بودن</option>
                                        <option value="2">براساس قیمت: کم به زیاد</option>
                                        <option value="3"> براساس قیمت: زیاد به کم</option>
                                    </select>
                                    <label class="lable-select-sort d-none d-sm-block" for="select-sort">از 135 محصول
                                    </label>
                                </div> --}}
                            {{-- <div
                                class="box-select-NumberProduct-the-page d-none  d-md-flex align-items-center justify-content-end mb-4">
                                <label class="lable-select-NumberProduct-the-page" for="select-NumberProduct-the-page">نمایش
                                </label>
                                <select class="custom-select mx-3" id="select-NumberProduct-the-page">
                                    <option selected="">12</option>
                                    <option value="1">24</option>
                                    <option value="2">36</option>
                                    <option value="3"> 48</option>
                                </select>
                                <span>محصول در صفحه</span>
                            </div> --}}
                        </div>
                        <div class="area-all-product mb-4">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div
                                        class="col-12   col-sm-6 col-md-4 col-lg-3 mb_col_productNew d-flex justify-content-center">
                                        <div class="product_cart">
                                            <a href="{{ route('home.products.show', ['product' => $product->id]) }}"
                                                class="card_product_img"><img src="{{ asset($product->image) }}"
                                                    class="img-fluid" /></a>
                                            <div class="body_card_product text-right">
                                                <a href="{{ route('home.products.show', ['product' => $product->id]) }}">
                                                    <h3>
                                                        {{ $product->title }} </h3>
                                                </a>
                                                <div class="price_card_product"><span>
                                                        {{ number_format($product->price) }}
                                                        تومان</span></div>
                                            </div>
                                            <div
                                                class="card_footer_product d-flex justify-content-between align-items-center">

                                                <div class="area_icon_cardFooter d-flex align-items-center">


                                                    <a href="#"><i class="fal fa-eye"></i><span class="tooltip-site">
                                                            بازدید : {{ $product->view_count }}</span></a>
                                                    <a href="#"><i class="fal fa-shopping-bag"></i><span
                                                            class="tooltip-site">
                                                            تعداد : {{ $product->count }}</span></a>
                                                </div>

                                            </div>
                                            <a href="{{ route('home.products.show', ['product' => $product->id]) }}"
                                                class="btn-5 mt-2 text-center"> جزییات محصول </a>

                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection


@section('script')

    <script type="text/javascript" src="{{ asset('/website/js/price-range-slider.js') }}"></script>

@endsection
