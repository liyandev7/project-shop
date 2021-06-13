@extends('auth.layouts.auth')
@section('title', 'ورود به وب سایت')
@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}"><b>ورود به سایت</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>

                <form method="POST" action="{{ route('login') }}">
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
                        <div  class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPCHA_SITE_KEY')}}"></div>


                        @error('g-recaptcha-response')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}> یاد اوری من
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <p class="mb-1">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            رمز عبور را فراموش کرده ام
                        </a>
                    @endif
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">ثبت نام</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

@endsection
