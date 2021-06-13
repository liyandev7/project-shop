@extends('admin.layouts.master')

@section('title', 'تایید شماره موبایل')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>پروفایل</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profile.home') }}">پروفایل کاربری</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profile.manage.2fa.view') }}">
                                    تنظیمات حریم شخصی
                                </a></li>
                            <li class="breadcrumb-item active">تایید شماره موبایل</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @include('admin.partials.alert')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ auth()->user()->image }}"
                                        alt="{{ auth()->user()->email }}">
                                </div>

                                <h3 class="profile-username text-center">
                                    {{ auth()->user()->name }}
                                </h3>

                                <h5 class="text-center font-weight-light">
                                    {{ auth()->user()->email }}
                                </h5>

                                <h6 class="text-center">
                                    {{ auth()->user()->phone }}
                                </h6>




                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">

                                    <li class="nav-item"><a
                                            class="nav-link {{ request()->is('admin/panel/profile/managetwofactor/verify/code') ? 'active' : '' }}"
                                            href="{{ route('profile.manage.view.verify.code') }}">
                                            تایید شماره موبایل
                                        </a>
                                    </li>



                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">



                                    <div class="active tab-pane" id="setting-profile">
                                        <form action="{{ route('profile.manage.verify.code') }}" method="POST"
                                            class="form-horizontal">
                                            @csrf

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="code" class="col-sm-2 control-label">
                                                        کد تایید
                                                    </label>


                                                    <input type="text" name="code" class="form-control" id="code" max="6"
                                                        maxlength="6" placeholder=" کد تایید شماره موبایل"
                                                        value="{{ old('code') }}">

                                                    @error('code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
