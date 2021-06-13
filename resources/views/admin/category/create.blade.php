@extends('admin.layouts.master')

@section('title','صفحه اصلی - اضافه کردن دسته بندی ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> اضافه کردن دسته بندی</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">خانه</a></li>
                            <li class="breadcrumb-item active">اضافه کردن دسته بندی</li>
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
                        <h3 class="card-title">اضافه کردن دسته بندی</h3>
                    </div>


                </div>
                <div class="card-body">

                    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="title">نام دسته بندی </label>
                                    <input type="text" name="title" id="title"
                                           class="form-control form-control-sm @error('title') is-invalid @enderror"
                                           value="{{old('title')}}">


                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="label">نام مشخصه دسته بندی </label>
                                    <input type="text" name="label" id="label"
                                           class="form-control form-control-sm @error('label') is-invalid @enderror"
                                           value="{{old('label')}}">


                                    @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="parent_id">دسته والد </label>

                                    <select name="parent_id" id="parent_id" class="form-control parent_id"
                                            style="width: 100%">

                                        @foreach($categories as $key=>$category)
                                            <option value="{{$key}}" >{{$category}}</option>

                                            @endforeach
                                    </select>

                                    @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="file"> آپلود ایکون </label>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="file">
                                        <label class="custom-file-label" for="file">انتخاب فایل</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">اضافه کردن</button>
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


