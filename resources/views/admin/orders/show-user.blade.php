@extends('admin.layouts.master')

@section('title', 'صفحه اصلی - جزییات کاربر ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="modal model_delete" style="z-index: 99999999999999999" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <p>ایا از حذف این کاربر رضایت دارید ؟</p>
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
                        <h1> جزییات کاربر </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">جزییات کاربر </li>
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
                        <h3 class="card-title">جزییات کاربر </h3>
                    </div>



                </div>
                <div class="card-body">

                    @include('admin.partials.alert')





                    <form style="display: none" id="delete" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>

                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>

                                <th> آیدی کاربر</th>
                                <th> نام کاربر</th>
                                <th> ایمیل کاربر</th>
                                <th> استان</th>
                                <th> شهر</th>
                                <th> آدرس</th>
                                <th> کد پستی</th>
                                <th> شماره تلفن ارسالی</th>
                                <th> شماره تلفن کاربر</th>
                                <th>تاریخ ایجاد</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr>

                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $province->name }}
                                </td>
                                <td>
                                    {{ $city->name }}
                                </td>
                                <td>
                                    {{ $user->profile->address }}
                                </td>
                                <td>
                                    {{ $user->profile->postal_code }}
                                </td>
                                <td>
                                    {{ $user->profile->phone }}
                                </td>
                                <td>
                                    {{ $user->phone ?? 'ثبت نشده است ' }}
                                </td>
                                <td>
                                    {{ \Hekmatinasser\Verta\Verta::instance($user->created_at) }}
                                </td>


                            </tr>



                        </tbody>

                    </table>

                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
