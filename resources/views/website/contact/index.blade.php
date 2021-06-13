@extends('layouts.app')
@section('title','تماس با ما')
@section('content')
<div class="content">
    <section>
        <div class="bg-gradiant contact-us contacts-v2 d-flex align-items-center">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-7  col-lg-6">
                        <h1 class="h2 text-light mb-3">تماس با ما</h1>
                        <p class="text-light"> با تکمیل فرم زیر با ما تماس بگیرید یا اکنون با ما تماس بگیرید ما به
                            طور معمول ظرف 2 روز کاری پاسخ می دهیم.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="area-information-contacts-v2 mb-5 pb-sm-2 pb-md-3  pb-lg-4 pb-xl-5">
        <div class="container">
            <div class="row ">
                <div class="col-12  col-sm-6 col-lg-3 item-card-info-contact">
                    <div class="box-icon-contact-us">
                        <div class="card ">
                            <div class="card-header">
                                <i class="far fa-envelope  text-success"></i>
                            </div>
                            <div class="card-body p-0">

                                <h5 class="card-title">آدرس ایمیل</h5>
                                <div class="card-text ">
                                    <p class="mb-0">
                                        {{$setting['email']}}
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-sm-6 col-lg-3 item-card-info-contact">
                    <div class="box-icon-contact-us">
                        <div class="card ">
                            <div class="card-header">
                                <i class="fal fa-phone-alt text-danger"></i>
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title">شماره تلفن</h5>
                                <div class="card-text">
                                    <p class="mb-0">
                                        موبایل :
                                        {{$setting['phone']}} </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-sm-6 col-lg-3 item-card-info-contact">
                    <div class="box-icon-contact-us">
                        <div class="card ">
                            <div class="card-header">
                                <i class="fal fa-map-marker-alt text-primary"></i>
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title">آدرس ما</h5>
                                <div class="card-text">
                                    <p>
                                        {{$setting['address']}}
                                    </p>
                                    <a class="fancy scrollTo mt-" href="#map_container">برو به گوگل مپ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-sm-6 col-lg-3  item-card-info-contact">
                    <div class="box-icon-contact-us">
                        <div class="card ">
                            <div class="card-header">
                                <i class="fal fa-clock text-warning"></i>
                            </div>
                            <div class="card-body p-0">

                                <h5 class="card-title">تایم کاری</h5>
                                <div class="card-text">
                                    <p class="mb-0">
                                        از شنبه تا پنج شنبه
                                        ساعت 8 تا5 بعد از ظهر </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="border-top">
        <div class="area-map-formContact d-lg-flex">
            <div id="map_container" class="order-2">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3389.3391899106414!2d54.38916968499548!3d31.842984081264053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fa89f5c656d85a7%3A0x8ce0e26021db13cf!2z2KfYs9iq2KfZhiDbjNiy2K_YjCDbjNiy2K_YjCDYotuM2Kog2KfZhNmE2Ycg2qnYp9i02KfZhtuM2Iwg2KfbjNix2KfZhg!5e0!3m2!1sfa!2sfr!4v1621423855311!5m2!1sfa!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <div class="area-form-contact order-1">
                <h1 class="h3 mb-4 pb-2">تماس با ما</h1>
                <!-- Default form contact -->
                <form class="form-row" action="{{route('contact')}}" method="POST">
                    @csrf
                    <!-- Name -->
                    <div class="col-sm-6 form-group mb-4">
                        <label for="name">نام <span class="text-danger ">*</span>
                        </label>
                        <input type="text" name="name"  class="form-control" id="name"
                               placeholder="نام را وارد کنید ">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Email -->
                    <div class="col-sm-6  form-group mb-4">
                        <label for="email">ایمیل <span class="text-danger ">*</span>
                        </label>
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="ایمیل را وارد کنید *">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> <!-- phone -->
                    <div class="col-sm-6  form-group mb-4">
                        <label for="phone">موبایل <span class="text-danger ">*</span> </label>
                        <input type="text" name="phone" class="form-control" id="phone"
                               placeholder="شماره موبایل را وارد کنید *">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- subject -->
                    <div class="col-sm-6  form-group mb-4">
                        <label for="subject">موضوع <span class="text-danger ">*</span> </label>
                        <input type="text" name="subject" class="form-control" id="subject"
                               placeholder="موضوع را وارد کنید ">
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Message -->

                    <div class="col-12 form-group mb-4">
                        <label for="message">پیام <span class="text-danger ">*</span> </label>
                        <textarea name="message" class="form-control" required="" id="message" rows="8"
                                  placeholder="نظر شما *"></textarea>

                        @error('message')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <!-- Send button -->
                    <div class="col-12 area-btn-form-contact">
                        <button type="submit" class="btn-5"> ارسال پیام</button>
                    </div>
                </form>
                <!-- Default form contact -->
            </div>

        </div>
    </section>
</div>
@endsection
