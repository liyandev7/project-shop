@extends('admin.layouts.master')

@section('title', 'صفحه اصلی - ابدیت کردن کاربر ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> ابدیت کردن کاربر</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">ابدیت کردن کاربر</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">


            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <h3 class="card-title">ابدیت کردن کاربر</h3>
                    </div>


                </div>
                <div class="card-body">

                    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="name">نام کاربر </label>
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        value="{{ old('name') ?? $user->name }}">


                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="email">ایمیل </label>
                                    <input type="email" name="email" id="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        value="{{ old('email') ?? $user->email }}">


                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="phone">شماره موبایل </label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') ?? $user->phone }}">


                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="role">نقش </label>

                                    <select class="form-control" id="role" name="role">
                                        @foreach (config('role.roles') as $key => $value)
                                            <option value="{{ $value }}"
                                                {{ $value === $user->sttaf ? 'selected' : '' }}>{{ $key }}
                                            </option>
                                        @endforeach

                                    </select>


                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="password"> پسورد </label>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}">


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="password_confirmation"> تکرار پسورد </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                                        value="{{ old('password_confirmation') }}">


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="file"> آپلود تصویر </label>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="file">
                                        <label class="custom-file-label" for="file">انتخاب فایل</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="image_priview">پیش نمایش تصویر </label>
                                    <br>
                                    <br>
                                    <img src="{{ asset('upload/' . $user->image) }}" alt="{{ $user->name }}"
                                        width="120" height="120">
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">ابدیت کردن</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
