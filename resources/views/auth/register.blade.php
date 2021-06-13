@extends('auth.layouts.auth')
@section('title', 'ثبت نام در وب سایت')
@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('register') }}"><b>ثبت نام در سایت</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">فرم زیر را تکمیل کنید و ثبت نام کنید</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3 input-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            placeholder="ایمیل">
                        <div class="input-group-append">
                            <span class="fa fa-envelope input-group-text"></span>
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 input-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="نام کاربری">
                        <div class="input-group-append">
                            <span class="fa fa-user input-group-text"></span>
                        </div>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            placeholder="شماره موبایل">
                        <div class="input-group-append">
                            <span class="fa fa-phone input-group-text"></span>
                        </div>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="رمز عبور " required autocomplete="current-password">
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span>
                        </div>


                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 input-group">
                        <input id="password_confirmation" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                            placeholder="تکرار رمز عبور  " required>
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span>
                        </div>


                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 input-group">
                        <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPCHA_SITE_KEY')}}"></div>


                        @error('recaptcha')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">ثبت نام</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <p class="mb-0">
                    <a href="{{ route('login') }}" class="text-center"> اکانت کاربری خود را دارید , پس با آن وارد شوید .
                    </a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

@endsection
