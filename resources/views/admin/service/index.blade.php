@extends('admin.layouts.master')

@section('title', 'صفحه اصلی - مدیریت سرویس ها ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="modal model_delete" style="z-index: 99999999999999999" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <p>ایا از حذف این سرویس رضایت دارید ؟</p>
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
                        <h1> مدیریت سرویس ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت سرویس ها</li>
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
                        <h3 class="card-title">مدیریت سرویس ها</h3>
                    </div>

                    <div class="float-left">
                        <a href="{{ route('services.create') }}" class="btn btn-sm btn-primary">اضافه کردن سرویس </a>
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

                                <th> نام سرویس </th>
                                <th> ایکون</th>
                                <th> تاریخ ایجاد </th>
                                <th> عملیات </th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $service->name }}</td>
                                    <td>
                                        <img src="{{asset($service->icon)}}" alt="" width="64" class="img-fluid" height="64">
                                    </td>




                                    <td>
                                        {{ \Hekmatinasser\Verta\Verta::instance($service->created_at) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('services.edit', ['service' => $service->id]) }}"
                                            class="btn btn-sm btn-primary">ویرایش</a>
                                        <a onclick="showModal('{{ url('/admin/panel/services' . '/' . $service->id) }}')"
                                            class="btn btn-sm text-white btn-danger">حذف</a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>
                {{ $services->links() }}
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
