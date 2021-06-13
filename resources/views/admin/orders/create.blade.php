@extends('admin.layouts.master')

@section('title', 'صفحه اصلی - ویرایش کردن سفارش ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> ویرایش کردن سفارش</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">ویرایش کردن سفارش</li>
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
                        <h3 class="card-title">ویرایش کردن سفارش</h3>
                    </div>



                </div>
                <div class="card-body">

                    <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="">شماره سفارش </label>
                                    <input type="text" name="testinput" id="testinput" class="form-control form-control-sm "
                                        value="{{ $order->id }}" disabled>



                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">هزینه سفارش</label>
                                    <input type="number" class="form-control" id="inputEmail3" disabled
                                        value={{ $order->price }}>
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">وضعیت سفارش</label>
                                    <select name="status" class="form-control">
                                        <option value="unpaid"
                                            {{ old('status', $order->status) == 'unpaid' ? 'selected' : '' }}>پرداخت نشده
                                        </option>
                                        <option value="paid"
                                            {{ old('status', $order->status) == 'paid' ? 'selected' : '' }}>پرداخت شده
                                        </option>
                                        <option value="preparation"
                                            {{ old('status', $order->status) == 'preparation' ? 'selected' : '' }}>در حال
                                            پردازش</option>
                                        <option value="posted"
                                            {{ old('status', $order->status) == 'posted' ? 'selected' : '' }}>ارسال شد
                                        </option>
                                        <option value="received"
                                            {{ old('status', $order->status) == 'received' ? 'selected' : '' }}>دریافت شد
                                        </option>
                                        <option value="canceled"
                                            {{ old('status', $order->status) == 'canceled' ? 'selected' : '' }}>کنسل شده
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">کد پیگیری</label>
                                    <input type="text" name="tracking_serial" class="form-control" id="inputPassword3"
                                        placeholder="کد پیگیری را وارد کنید"
                                        value="{{ old('tracking_serial', $order->tracking_serial) }}">
                                </div>
                            </div>
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">ویرایش کردن </button>
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
