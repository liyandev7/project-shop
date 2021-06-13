@extends('admin.layouts.master')

@section('title','صفحه اصلی - مدیریت تماس  ها ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="modal model_delete" style="z-index: 99999999999999999" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <p>ایا از حذف این تماس  رضایت دارید ؟</p>
                    </div>
                    <div class="modal-footer">
                        <a onclick="btnSubmitDelete()" type="button" class="btn btn-danger text-white ml-3">بله</a>
                        <a onclick="closeDelete()" type="button" class="btn btn-secondary text-white" data-dismiss="modal">خیر</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> مدیریت تماس  ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت تماس  ها</li>
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
                        <h3 class="card-title">مدیریت تماس  ها</h3>
                    </div>


                </div>
                <div class="card-body">

                    @include('admin.partials.alert')


                    <div class="row">
                        <div class="col-md-3">
                            <form action="" method="GET">
                                <div class="form-group d-flex">
                                    <input value="{{request()->get('search') ?? ''}}" type="search" class="form-control form-control-sm" name="search" placeholder="عبارت خود را جست و جو کنید ... ">
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
                            <th>نام   </th>
                            <th> موضوع  </th>
                            <th>  ایمیل </th>
                            <th>  موبایل </th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                {{$contact->name}}
                            </td>
                            <td>
                                {{$contact->subject}}
                            </td>
                            <td>
                                {{$contact->email}}
                            </td>
                            <td>
                                {{$contact->phone}}
                            </td>
                            <td>
                                {{\Hekmatinasser\Verta\Verta::instance($contact->created_at)}}
                            </td>
                            <td>
                                <a href="{{route('contact.email',['contact'=>$contact->id])}}" class="btn btn-sm btn-info">جواب دادن به صورت ایمیل</a>
                                <a onclick="showModal('{{url('/admin/panel/contacts'.'/'.$contact->id)}}')" class="btn btn-sm text-white btn-danger">حذف</a>

                            </td>

                        </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>
            {{$contacts->links()}}
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection


