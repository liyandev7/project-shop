@extends('admin.layouts.master')

@section('title','صفحه اصلی - ویرایش  کردن دسته بندی ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> ویرایش  کردن دسته بندی</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">خانه</a></li>
                            <li class="breadcrumb-item active">ویرایش  کردن دسته بندی</li>
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
                        <h3 class="card-title">ویرایش  کردن دسته بندی</h3>
                    </div>


                </div>
                <div class="card-body">

                    <form action="{{route('categories.update',['category'=>$category->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="title">نام دسته بندی </label>
                                    <input type="text" name="title" id="title"
                                           class="form-control form-control-sm @error('title') is-invalid @enderror"
                                           value="{{$category->title ?? old('title') }}">


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
                                           value="{{$category->label ?? old('label')}}">


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
                                        <option value="0" selected>دسته بندی اصلی</option>
                                        @foreach($categories as $key=>$cat)
                                            <option value="{{$key}}" {{$category->id == $key ? 'selected' : ''}} >{{$cat}}</option>

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


                            @isset($category->icon)
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="#">آیکون انتخاب دسته بندی </label>
                                    <img src="{{ asset('/upload/'.$category->icon) }}" alt="">
                                </div>
                            </div>
                            @endisset



                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">ویرایش  کردن</button>
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


