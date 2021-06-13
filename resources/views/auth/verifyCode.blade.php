@extends('auth.layouts.auth')
@section('title', 'تایید شماره موبایل')
@section('content')

    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card">
            @include('admin.partials.alert')
            <div class="card-body login-card-body">
                <p class="login-box-msg">احراز هویت دو مرحله ایی</p>

                <form method="POST" action="{{route('verify.code.sms')}}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                            placeholder="کد تایید " maxlength="6">
                        <div class="input-group-append">
                            <span class="fa fa-code input-group-text"></span>
                        </div>

                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">تایید کد</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

@endsection
