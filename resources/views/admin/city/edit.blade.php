@extends('admin.layouts.master')

@section('title','صفحه اصلی - ابدیت  کردن شهر ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> ابدیت  کردن شهر</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">خانه</a></li>
                            <li class="breadcrumb-item active">ابدیت  کردن شهر</li>
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
                        <h3 class="card-title">ابدیت  کردن شهر</h3>
                    </div>



                </div>
                <div class="card-body">

                    <form action="{{route('cities.update',['city'=>$city->id])}}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="name">نام  شهر </label>
                                    <input  type="text" name="name" id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{$city->name ?? old('name')}}">


                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="province_id">نام استان </label>
                                    <select name="province_id" id="province_id" class="form-control parent_id">
                                        @foreach($provinces as $province)
                                        <option value="{{$province->id}}" {{$province->id == $city->province->id ? 'selected' : ''}}>{{$province->name}}</option>
                                        @endforeach
                                    </select>


                                    @error('province_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="label">نام مشخصه شهر </label>
                                    <input  type="text" name="label" id="label" class="form-control form-control-sm @error('label') is-invalid @enderror" value="{{$city->label ?? old('label')}}">


                                    @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">ابدیت  کردن </button>
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


