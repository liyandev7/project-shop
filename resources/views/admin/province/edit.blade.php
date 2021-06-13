@extends('admin.layouts.master')

@section('title','صفحه اصلی - ابدیت کردن استان ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> ابدیت کردن استان</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">خانه</a></li>
                            <li class="breadcrumb-item active">
                                {{$province->name}}
                                ابدیت کردن استان</li>
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
                        <h3 class="card-title">ابدیت کردن استان  :{{$province->name}}</h3>
                    </div>



                </div>
                <div class="card-body">

                    <form action="{{route('provinces.update',['province'=>$province->id])}}" method="POST">
                        @method("PATCH")
                        @csrf

                        <div class="row">
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="name">نام  استان </label>
                                    <input  type="text" name="name" id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{$province->name ??old('name') }}">


                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="label">نام مشخصه استان </label>
                                    <input  type="text" name="label" id="label" class="form-control form-control-sm @error('label') is-invalid @enderror" value="{{$province->label ?? old('label')}}">


                                    @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">ابدیت کردن </button>
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


