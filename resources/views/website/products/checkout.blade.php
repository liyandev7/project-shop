@extends('layouts.app')

@section('title', 'تکمیل سفارش')

@section('content')

    <div class="content checkout">
        <section class="area-content-checkout">
            <div class="container">
                <div class="row ">
                    <div class="col-12 col-lg-8 py-5 pl-lg-5">
                        <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                                <li class="breadcrumb-item active">پرداخت</li>
                            </ol>
                        </nav>
                        <div class="title_site text-right">
                            <h1 class="">پرداخت</h1>
                        </div>






                        <div class="area-details-checkout">

                            <div class="area-form-wrap">

                                <!-- Default form contact -->
                                <form class="form-row" action="{{ route('profile.checkout') }}" method="POST">
                                    @csrf
                                    <h4 class="col-12 mb-4 heading-style1"> جزئیات صورتحساب</h4>

                                    <div class="col-12 col-sm-6 form-group mb-4 ">
                                        <label for="first_name">نام <span class="text-danger ">*</span>
                                        </label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                                            class="form-control" id="name">

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 form-group mb-4 ">
                                        <label for="last_name">نام خانوادگی <span class="text-danger ">*</span>
                                        </label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                                            class="form-control" id="name">

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-sm-12 form-group mb-4 ">
                                        <label for="address"> ادرس <span class="text-danger ">*</span>
                                        </label>
                                        <input type="text" name="address" value="{{ old('address') }}"
                                            class="form-control" id="name">

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="col-12 form-group mb-4">
                                        <label for="select-country-checkout">استان <span class="text-danger ">*</span>
                                        </label>
                                        <div class="custom_select mb-3">
                                            <select name="province" class="form-control col-12 "
                                                id="select-country-checkout">

                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 form-group mb-4">
                                        <label for="select-country-checkout">شهر <span class="text-danger ">*</span>
                                        </label>
                                        <div class="custom_select mb-3">
                                            <select name="city" class="form-control col-12 " id="select-country-checkout">

                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-12 form-group mb-4">
                                        <label for="postal_code"> کد پستی <span class="text-danger ">*</span>
                                        </label>
                                        <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                                            class="form-control" id="name">

                                        @error('postal_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-sm-12 form-group mb-4 ">
                                        <label for="phone"> شماره موبایل <span class="text-danger ">*</span>
                                        </label>
                                        <input type="text" name="phone" maxlength="11"
                                            value="{{ old('phone') ?? auth()->user()->phone }}" class="form-control"
                                            id="name">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="col-12 form-group mb-4 ">
                                        <button type="submit" class="btn-5 text-center">افزودن</button>
                                    </div>



                                </form>
                                <!-- Default form contact -->
                            </div>













                        </div>

                    </div>


                    <div class="col-12 col-lg-4 py-5 col-bg-details-product ">


                        <h4 class="mb-4 heading-style1">سفارشات شما</h4>
                        <div class="area-order-review">

                            <div class="table-wrapper-review-order mb-4">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>محصول</th>
                                            <th> تعداد</th>
                                            <th>جمع</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cart = Cart::instance('cart');
                                            $cartItems = $cart->all();
                                            $price = $cartItems->sum(function ($cart) {
                                                return $cart['product']->price * $cart['quantity'];
                                            });

                                            $orderItems = $cartItems->mapWithKeys(function ($cart) {
                                                return [$cart['product']->title => ['quantity' => $cart['quantity'], 'price' => $cart['product']->price]];
                                            });
                                        @endphp

                                        @foreach ($orderItems as $key => $order)



                                            <tr>
                                                <td>
                                                    {{ $key }}</td>

                                                <td>{{ $order['quantity'] }}</td>
                                                <td>
                                                    {{ $order['price'] }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>جمع</th>
                                            <td class="product-subtotal">{{ number_format($price) }} تومان</td>
                                        </tr>


                                    </tfoot>
                                </table>
                            </div>




                        </div>


                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
