@extends('admin.layouts.master')

@section('title', 'صفحه اصلی - ابدیت کردن نظر ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> ابدیت کردن نظر</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">ابدیت کردن نظر</li>
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
                        <h3 class="card-title">ابدیت کردن نظر</h3>
                    </div>


                </div>
                <div class="card-body">

                    <form action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="text">عنوان نظر </label>
                                    <input type="text" name="text" id="text"
                                        class="form-control form-control-sm @error('text') is-invalid @enderror"
                                        value="{{ old('text') ?? $comment->text }}">


                                    @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="apporved"> وضعیت </label>
                                    <select name="apporved" id="apporved" class="form-control form-control-sm">
                                        @foreach (config('approved') as $key => $value)
                                            <option value={{ $value }}
                                                {{ $value === $comment->$value ? 'selected' : '' }}> {{ $key }}
                                            </option>
                                        @endforeach


                                    </select>


                                    @error('apporved')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
