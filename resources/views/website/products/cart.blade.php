@extends('layouts.app')

@section('title', 'سبد خرید')

@section('content')

    <div class="content-cart pb-4 pb-xl-5 pt-5">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb" class="mb-5">
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">خانه</a></li>
                                <li class="breadcrumb-item active">سبد خرید</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-9">
                        <div class="area-content-cart">

                            <div class="table-cart-shop ">
                                <div class="d-none d-md-block">
                                    <div class="area-title-table-cart box-table-cart  box-cart d-flex align-items-center">
                                        <div class="item-table-cart product-cart">محصول</div>
                                        <div class="item-table-cart product-count">تعداد</div>
                                        <div class="item-table-cart product-price">قیمت</div>
                                        <div class="item-table-cart total">جمع جزء</div>
                                    </div>
                                </div>
                                @foreach (Cart::all() as $cart)
                                    @if (isset($cart['product']))
                                        @php
                                            $product = $cart['product'];
                                        @endphp
                                        <div
                                            class="area-content-table-cart box-table-cart box-cart d-flex flex-column flex-md-row align-items-center  ">
                                            <div
                                                class="item-table-cart product-cart  d-flex flex-column flex-md-row align-items-center">
                                                <form action="{{ route('cart.destroy', $cart['id']) }}"
                                                    id="delete-cart-{{ $product->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <a onclick="event.preventDefault();document.getElementById('delete-cart-{{ $product->id }}').submit()"
                                                    class="btn btn-remove-cart btn-remove">
                                                    <i class="fas fa-trash-alt"></i>
                                                    <span class="tooltip-site">حذف</span>
                                                </a>
                                                <div class="img-product-cart mb-4 mb-md-0 mx-1">
                                                    <a href="#"><img src="{{ asset($product->image) }}"></a>
                                                </div>
                                                <div class="title-product-cart mb-4 mb-md-0 ml-0 ml-md-2">
                                                    <a
                                                        href="{{ route('home.products.show', ['product' => $product->id]) }}">
                                                        <h3>{{ $product->title }} </h3>
                                                    </a>

                                                    @if ($product->attributes)
                                                        <small>
                                                            @foreach ($product->attributes->take(3) as $attr)
                                                                <span class="text-muted">{{ $attr->name }}: </span>
                                                                {{ $attr->pivot->value->value }}
                                                            @endforeach
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="item-table-cart product-count  mb-4 mb-md-0">
                                                <select onchange="changeQuantity(event, '{{ $cart['id'] }}')"
                                                    class="form-control text-center">
                                                    @foreach (range(1, $product->count) as $item)
                                                        <option value="{{ $item }}"
                                                            {{ $cart['quantity'] == $item ? 'selected' : '' }}>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="item-table-cart product-price ">
                                                {{ number_format($product->price) }} تومان
                                            </div>
                                            <div class="item-table-cart total ">
                                                تومان {{ number_format($product->price * $cart['quantity']) }}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach



                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="area-checkout-cart box-cart">
                            <div class="cart-subtotal d-flex justify-content-between align-items-center ">
                                <span>مجموع</span>
                                @php
                                    $totalPrice = Cart::all()->sum(function ($cart) {
                                        return $cart['product']->price * $cart['quantity'];
                                    });
                                @endphp
                                <span class="subtotal">{{ number_format($totalPrice) }} تومان</span>
                            </div>

                            <div class="area-btn-checkout mt-4 ">
                                <a href="{{ route('cart.checkout') }}" class="btn btn-5">ادامه جهت تسویه حساب</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection


@section('script')
    <script>
        function changeQuantity(event, id, cartName = null) {
            //
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })

            //
            $.ajax({
                type: 'POST',
                url: '/cart/quantity/change',
                data: JSON.stringify({
                    id: id,
                    quantity: event.target.value,
                    // cart : cartName,
                    _method: 'patch'
                }),
                success: function(res) {
                    location.reload();
                }
            });
        }

    </script>
@endsection
