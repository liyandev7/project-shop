@extends('layouts.app')

@section('title', 'صفحه محصول ' . $product->title)

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />

@endsection

@section('content')

    <div class="content mb-5 singleProduct left-details">
        <section class="area-details-product ">
            <div class="container">
                <div class="row ">
                    <div class="col-12 col-lg-8 py-4 order-2 order-lg-1">
                        <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb breadcrumb-singleProduct ">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">خانه</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('home.products.index') }}">محصولات</a></li>
                                <li class="breadcrumb-item active"> {{ $product->title }} </li>
                            </ol>
                        </nav>
                        <div class="title-product-single  mb-5">
                            <h1 class="element">
                                {{ $product->title }}
                            </h1>
                        </div>
                        <div class="area-details-product-single d-flex mb-3 ">
                            <div class="nav  nav-pills nav-pills-custom flex-column ml-5" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link-TabprouductSingle my-2 d-flex justify-content-center active"
                                    id="v-pills-home-tab" data-toggle="pill" href="#tab-prouduct-single1" role="tab"
                                    aria-controls="v-pills-home" aria-selected="false">
                                    <div class="tab-product-single d-flex align-items-center">
                                        <img src="{{ asset($product->image) }}" />
                                    </div>
                                </a>
                                <a class="nav-link-TabprouductSingle my-2 d-flex justify-content-center"
                                    id="v-pills-profile-tab" data-toggle="pill" href="#tab-prouduct-single2" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="true">
                                    <div class="tab-product-single d-flex align-items-center">
                                        <img src="{{ asset($product->image) }}" />
                                    </div>
                                </a>
                                <a class="nav-link-TabprouductSingle my-2 d-flex justify-content-center"
                                    id="v-pills-messages-tab" data-toggle="pill" href="#tab-prouduct-single3" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">
                                    <div class="tab-product-single d-flex align-items-center">
                                        <img src="{{ asset($product->image) }}" />
                                    </div>
                                </a>
                                <a class="nav-link-TabprouductSingle my-2 d-flex justify-content-center"
                                    id="v-pills-messages-tab" data-toggle="pill" href="#tab-prouduct-single4" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">
                                    <div class="tab-product-single d-flex align-items-center">
                                        <img src="{{ asset($product->image) }}" />
                                    </div>
                                </a>
                            </div>
                            <div class="tab-content w-100 d-flex justify-content-center align-items-center"
                                id="v-pills-tabContent">

                                <div class="tab-pane fade shadow rounded active show" id="tab-prouduct-single1"
                                    role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="area-img-singleproduct">
                                        <img src="{{ asset($product->image) }}" class=" MagicZoom img-fluid" />
                                    </div>
                                </div>
                                <div class="tab-pane fade shadow rounded " id="tab-prouduct-single2" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="area-img-singleproduct">
                                        <img src="{{ asset($product->image) }}" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="tab-pane fade shadow rounded " id="tab-prouduct-single3" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <div class="area-img-singleproduct">
                                        <img src="{{ asset($product->image) }}" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="tab-pane fade shadow rounded " id="tab-prouduct-single4" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <div class="area-img-singleproduct">
                                        <img src="{{ asset($product->image) }}" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-4 py-5 col-bg-details-product order-1 order-lg-2">

                        <div class="area-price-singleProduct d-flex">
                            <span class="ml-2"> قیمت: </span>

                            <p class="price">
                                {{ number_format($product->price) }} تومان </p>
                        </div>


                        <div class="area-addtocart-singleProduct d-flex align-items-center mb-4 mt-4">

                            <!-- <button class="btn btn-primary btn-block" type="button">اضافه به سبد خرید</button> -->
                            <form action="{{ route('cart.add.product', ['product' => $product->id]) }}" method="POST"
                                class="w-100">
                                @csrf
                                <button class="btn-5 w-100" type="submit">اضافه به سبد خرید</button>
                            </form>
                        </div>

                        <div class="area-information-single-product">
                            <p class="mb-3">

                            </p>

                        </div>
                        <hr class="my-4">
                        <ul class="category-single-product">
                            @foreach ($product->attributes as $attribute)
                                <li><span> {{ $attribute->name }} :

                                        @foreach ($attribute->values as $value)
                                            , {{ $value->value }}
                                        @endforeach
                                    </span>

                                </li>
                            @endforeach
                            <li><span> تعداد: </span>{{ $product->count }}</li>
                            <li><span> تعداد بازدید: </span>{{ $product->view_count }}</li>
                            <li><span>دسته بندی: </span><a>
                                    @foreach ($product->categories as $category)
                                        {{ $category->title }}
                                    @endforeach
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="area-video-single-page">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 d-flex align-items-center  order-2 order-md-1 ">
                        <div class="description-singleProduct">
                            <h2 class="mb-3"> توضیحات محصول نقد بررسی محصول </h2>
                            <p>


                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="area-review mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 mb-4 mb-lg-0 pb-2 pb-lg-0">

                        <div class="box-comments">
                            @if ($product->comments()->where('apporved', 1)->get()->count() <= 0)
                                <div class="alert alert-info">
                                    نظری برای نمایش موجود نیست .
                                </div>
                            @else
                                @foreach ($product->comments()->where('apporved', 1)->get()
        as $comment)
                                    <div class="item-comment border-bottom pb-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="porofile_customers-comment d-flex align-items-center mt-3">
                                                <img src="{{ $comment->user->image }}" />
                                                <div class="porofileName">
                                                    <h6>
                                                        {{ $comment->user->name }}
                                                    </h6>
                                                    <span>
                                                        @php
                                                            $v = Verta::instance($comment->created_at);
                                                        @endphp
                                                        {{ $v->format('%B %d، %Y') }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="star_rating-item-comment d-flex mb-3">
                                        </div>
                                        <p class="mb-3">
                                            {{ $comment->text }}
                                        </p>

                                    </div>
                                @endforeach

                            @endif


                        </div>

                    </div>
                    @guest
                        <div class="col-12 col-md-5 area-form-reviews">
                            <div class="alert alert-warning">
                                برای ثبت نظر با اکانت خود وارد شوید .
                            </div>
                        </div>
                    @endguest
                    @auth()
                        <div class="col-12 col-md-5 area-form-reviews">
                            <div class="box-form-reviews">
                                <!-- Default form contact -->
                                <form method="POST" class="px-4 px-md-3 px-lg-4 py-5 form-reviews"
                                    action="{{ route('website.comment') }}">
                                    @csrf
                                    <h3 class="h4 mb-4 caption-form">نوشتن دیدگاه</h3>
                                    <input type="hidden" name="commentable_id" value="{{ $product->id }}">
                                    <input type="hidden" name="commentable_type" value="{{ get_class($product) }}">
                                    <input type="hidden" name="parent_id" value="0">
                                    <div class="form-group mb-4">
                                        <label for="textarea-form">نوشتن دیدگاه <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="text" id="textarea-form" rows="6"
                                            placeholder="پیام شما"></textarea>
                                        <small class="text-form-description">دیدگاه شما باید حداقل 50 کاراکتر باشد</small>

                                        @error('text')
                                            <span class="invalid-feedback">
                                                <strong class="text-danger">
                                                    {{ $error }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Send button -->
                                    <button class="btn-5" type="submit">ارسال دیدگاه</button>
                                </form>
                                <!-- Default form contact -->
                            </div>
                        </div>
                    @endauth

                </div>
            </div>
        </section>
        <section class="area-slider-singleProduct mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title_site">
                            <h2>محصولات مرتبط</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel slider_single-product ">
                            @foreach ($product->categories as $category)
                                @foreach ($category->products as $p)
                                    <div class="item_slider_single-product">
                                        <div class=" d-flex justify-content-center">
                                            <div class="product_cart">
                                                <a href="{{ route('home.products.show', ['product' => $p->id]) }}"
                                                    class="card_product_img"><img src="{{ asset($product->image) }}"
                                                        class="img-fluid" /></a>
                                                <div class="body_card_product text-right">
                                                    <a href="{{ route('home.products.show', ['product' => $p->id]) }}">
                                                        <h3>
                                                            {{ $p->title }} </h3>
                                                    </a>
                                                    <div class="price_card_product"> <span>
                                                            {{ number_format($p->price) }}
                                                            تومان</span></div>
                                                </div>
                                                <div
                                                    class="card_footer_product d-flex justify-content-between align-items-center">
                                                    <div class="star_rating">

                                                    </div>
                                                    <div class="area_icon_cardFooter d-flex align-items-center">
                                                        <a href="{{ route('home.products.show', ['product' => $p->id]) }}"
                                                            class="btn-5 mt-2 text-center"> جزییات محصول </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @php
    $options=\App\Option::all();

    @endphp


   @foreach($options as $option)

       <input {{isset($product->options[$loop->iteration-1]) && $product->options[$loop->iteration-1]->id === $option->id  ? 'checked' : ''}}  onchange="changeOptionsPrice(event,{{$option->id}},{{$product->id}})" type="checkbox" name="options[]" value="{{$option->id}}" id="{{$option->id}}">{{$option->name}} - {{$option->price}}
   @endforeach
@endsection


@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>

@section('script')
    <script>

        function changeOptionsPrice(event, id, product_id) {
            event.preventDefault();
            //
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })


            options=[...event.target.value];
            //
            $.ajax({
                type: 'POST',
                url: '/product/option/price',
                data: JSON.stringify({
                    id: id,
                    options: options,
                    product_id:product_id,
                    // cart : cartName,
                    _method: 'patch'
                }),
                success: function(res) {

                }
            });
        }

    </script>
@endsection
@endsection
