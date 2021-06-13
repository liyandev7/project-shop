@extends('admin.layouts.master')

@section('title', 'صفحه اصلی - مدیریت سفارش ها ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="modal model_delete" style="z-index: 99999999999999999" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <p>ایا از حذف این سفارش رضایت دارید ؟</p>
                    </div>
                    <div class="modal-footer">
                        <a onclick="btnSubmitDelete()" type="button" class="btn btn-danger text-white ml-3">بله</a>
                        <a onclick="closeDelete()" type="button" class="btn btn-secondary text-white"
                            data-dismiss="modal">خیر</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> مدیریت سفارش ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت سفارش ها</li>
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
                        <h3 class="card-title">مدیریت سفارش ها</h3>
                    </div>



                </div>
                <div class="card-body">

                    @include('admin.partials.alert')


                    <div class="row">
                        <div class="col-md-3">
                            <form action="" method="GET">
                                <div class="form-group d-flex">
                                    <input value="{{ request()->get('search') ?? '' }}" type="search"
                                        class="form-control form-control-sm" name="search"
                                        placeholder="عبارت خود را جست و جو کنید ... ">
                                    <button class="btn btn-secondary btn-sm mr-2"><i class="fa fa-search"></i></button>
                                </div>

                            </form>
                        </div>
                    </div>


                    <form style="display: none" id="delete" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>

                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ایدی سفارش</th>
                                <th>نام کاربر </th>

                                <th>شماره پیگیری پستی</th>
                                <th> قیمت </th>
                                <th> وضعیت </th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                    <td>
                                        {{ $order->user->email }}
                                    </td>

                                    <td>{{ $order->tracking_serial ?? 'هنوز ثبت نشده' }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>
                                        @if ($order->status === 'unpaid')
                                            <span class="badge badge-danger">پرداخت نشده</span>

                                        @elseif($order->status === 'paid')
                                            <span class="badge badge-primary">پرداخت شده</span>
                                        @elseif($order->status === 'preparation')
                                            <span class="badge badge-info"> در حال پردازش</span>
                                        @elseif($order->status === 'canceled')
                                            <span class="badge badge-warning"> لغو شده </span>
                                        @elseif($order->status === 'posted')
                                            <span class="badge badge-secondary"> در حال ارسال </span>

                                        @elseif($order->status === 'received')
                                            <span class="badge badge-light">دریافت شده</span>
                                        @else
                                            <span class="badge badge-warning">مشکلی پیش آمده است</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ \Hekmatinasser\Verta\Verta::instance($order->created_at) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('orders.edit', ['order' => $order->id]) }}"
                                            class="btn btn-sm btn-primary">ویرایش</a>
                                        <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                                            class="btn btn-sm btn-info">نمایش جزییات سفارش</a>
                                        <a href="{{ route('orders.user.show', ['user' => $order->user->id]) }}"
                                            class="btn btn-sm btn-secondary">نمایش جزییات کاربر</a>
                                        <a onclick="showModal('{{ url('/admin/panel/orders' . '/' . $order->id) }}')"
                                            class="btn btn-sm text-white btn-danger">حذف</a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>
                {{ $orders->links() }}
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
