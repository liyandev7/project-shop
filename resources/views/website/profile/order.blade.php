@extends('layouts.app')

@section('title', ' لیست سفارش ها')
@section('content')
    <div class="content">
        <section>
            <div class="bg-gradiant-account">
                <div class="area-shape-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                        <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
                    </svg>
                </div>
            </div>
        </section>
        <section class="mb-5 area-content-paccount">
            <div class="container">
                <div class="row">
                    @include('website.profile.sidebar')

                    <div class="col-12 col-md-8">
                        <div class="tab-pane fade show active" id="content4" role="tabpanel" aria-labelledby="orders-tab">
                            <div
                                class="header-tab-content-account d-sm-flex justify-content-between align-items-center mb-4">

                                <h1 class="title-tabcontent-account mb-3 mb-sm-0">
                                    لیست سفارش ها
                                </h1>


                            </div>
                            <div id="accordionone" class="area-Orders-account">
                                @foreach ($orders as $order)
                                    <div class="card card-Orders-account mb-3">
                                        <div class="card-header">
                                            <div class="header-content-orders  d-sm-flex align-items-center justify-content-between"
                                                data-toggle="collapse" data-target="#collapse{{ $order->id }}"
                                                aria-expanded="true" aria-controls="collapse{{ $order->id }}"
                                                id="heading{{ $order->id }}">

                                                <div class="id-product-order item-header-orders">
                                                    کد رهگیری پست : {{ $order->tracking_serial ?? 'ثبت نشده است' }}
                                                </div>
                                                <div class="date-order item-header-orders"><i class="fal fa-clock ml-1"></i>
                                                    {{ \Hekmatinasser\Verta\Verta::instance($order->created_at) }}
                                                </div>


                                                @if ($order->status === 'paid')
                                                    <div class="stutus-order stutus-order-success item-header-orders">
                                                        پرداخت شده
                                                    </div>
                                                @elseif($order->status=== 'unpaid')
                                                    <div class="stutus-order stutus-order-danger item-header-orders">
                                                        لغو شده
                                                    </div>
                                                @else
                                                    <div class="stutus-order stutus-order-success item-header-orders">
                                                        پرداخت شده
                                                    </div>
                                                @endif
                                                <div class="price-product-order item-header-orders">
                                                    {{ number_format($order->price) }} تومان </div>

                                            </div>
                                        </div>
                                        <div id="collapse{{ $order->id }}" class="collapse collapse-content-orders"
                                            aria-labelledby="heading{{ $order->id }}" data-parent="#accordionone">
                                            <div class="card-body">
                                                @foreach ($order->products as $product)

                                                    <div
                                                        class="area-content-orders d-sm-flex align-items-center justify-content-between mb-4 mb-sm-3">
                                                        <div
                                                            class="area-ditails_product-orders d-flex align-items-center flex-column flex-sm-row">
                                                            <img src="{{ asset($product->image) }}" class="mb-3 mb-sm-0">
                                                            <div class="ditails_product-orders mr-3  text-center">
                                                                <a href="{{ route('home.products.show', ['product' => $product->id]) }}"
                                                                    class="nameproduct-orders mb-1">
                                                                    {{ $product->title }}
                                                                </a>
                                                                @foreach ($product->attributes as $attribute)
                                                                    <div><span>{{ $attribute->name }} : </span>
                                                                        @foreach ($attribute->values as $value)
                                                                            , {{ $value->value }}
                                                                        @endforeach
                                                                    </div>

                                                                @endforeach


                                                            </div>
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row flex-sm-column justify-content-center align-items-center ">
                                                            تعداد:
                                                            <span>{{ $product->pivot->quantity }}</span>
                                                        </div>
                                                        <div
                                                            class="d-flex  flex-row flex-sm-column justify-content-center align-items-center">
                                                            جمع کل:
                                                            <span>{{ $product->pivot->quantity * $product->price }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                </div>
            </div>




        </section>
    </div>

@endsection
