@extends('layouts.app')

@section('title', ' شماره حساب')
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
                        <div class="tab-pane fade  show active" id="content8" role="tabpanel"
                            aria-labelledby="setting-numberaccount-tab">
                            <div class="tab-content tab-content-account-user " id="myTabContent">
                                <div class="header-tab-content-account  mb-4">
                                    <h1 class="title-tabcontent-account">
                                        تغییر شماره حساب
                                    </h1>
                                </div>
                                <div class="notification-changeNumberaccount mb-4">
                                    <span class="text-danger bold">توجه: </span>
                                    برای دریافت شماره شبای حساب خود می توانید به سایت بانک خود مراجعه کرده و نسبت یه
                                    دریافت آنلاین شناسه شبای حساب خود اقدام نمایید.
                                </div>
                                <div class="text-info  notification-changeNumberaccount mb-4">

                                    <span class="text-danger bold">توجه: </span>
                                    مسئولیت اشتباه بودن اطلاعات بر عهده خود شما میباشد، و مبلغ واریزی قابل بازگشت
                                    نمیباشد.
                                </div>
                                <form action={{ route('profile.bank.store') }} method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="name">نام صاحب حساب</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="نام صاحب حساب"
                                            value="{{ auth()->user()->bank->name ?? old('name') }}">

                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong class="text-danger">
                                                    {{ $error }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="bank_name"> نام بانک</label>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name"
                                            placeholder="نام  بانک"
                                            value="{{ auth()->user()->bank->bank_name ?? old('bank_name') }}">

                                        @error('bank_name')
                                            <span class="invalid-feedback">
                                                <strong class="text-danger">
                                                    {{ $error }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="bank_number"> شماره حساب</label>
                                        <input type="text" class="form-control" id="bank_number" name="bank_number"
                                            placeholder="  شماره حساب"
                                            value="{{ auth()->user()->bank->bank_number ?? old('bank_number') }}">

                                        @error('bank_number')
                                            <span class="invalid-feedback">
                                                <strong class="text-danger">
                                                    {{ $error }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="number_cart"> شماره کارت</label>
                                        <input type="text" class="form-control" id="number_cart" name="number_cart"
                                            placeholder="  شماره کارت"
                                            value="{{ auth()->user()->bank->number_cart ?? old('number_cart') }}">

                                        @error('number_cart')
                                            <span class="invalid-feedback">
                                                <strong class="text-danger">
                                                    {{ $error }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="shaba"> شماره شبا</label>
                                        <input type="text" class="form-control" id="shaba" name="shaba"
                                            placeholder="  شماره شبا"
                                            value="{{ auth()->user()->bank->shaba ?? old('shaba') }}">

                                        @error('shaba')
                                            <span class="invalid-feedback">
                                                <strong class="text-danger">
                                                    {{ $error }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="d-flex justify-content-end mt-4">

                                        <div class="area-btn-save">
                                            <button type="submit" class="btn btn-5"> ذخیره تغییرات<i
                                                    class="far fa-sd-card mr-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>




        </section>
    </div>

@endsection
