@extends('admin.layouts.master')

@section('title', 'صفحه اصلی - درباره ما ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> درباره ما</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">درباره ما</li>
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
                        <h3 class="card-title">درباره ما</h3>
                    </div>


                </div>
                <div class="card-body">

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">


                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="description">توضیحات درباره ما </label>

                                    <textarea name="description" id="description" cols="30" rows="10"
                                        class="form-control">{!! $about->text  !!}   </textarea>


                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">آپلود ویدیو شاخص</label>
                                    <div class="input-group">
                                        <input type="text" id="image_label" class="form-control" name="image">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="button-image">انتخاب</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-7 " style="margin: 35px auto">
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

@section('javascript')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description'
        });

    </script>
    {{-- <script src="/js/ckeditor5-build-classic/ckeditor.js"></script> --}}
    <script>
        // CKEDITOR.replace('description', { filebrowserImageBrowseUrl: '/file-manager/ckeditor' });
        // ClassicEditor
        //     .create( document.querySelector( '#description' ) )
        //     .catch( error => {
        //         console.error( error );
        //     } );

        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }

    </script>

    <script>
        $('#categories').select2({
            'placeholder': 'دسترسی مورد نظر را انتخاب کنید'
        })


        let changeAttributeValues = (event, id) => {
            let valueBox = $(`select[name='attributes[${id}][value]']`);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })

            $.ajax({
                type: 'POST',
                url: '/admin/panel/attributes/values',
                data: JSON.stringify({
                    name: event.target.value
                }),
                success: function(data) {
                    valueBox.html(`
                                                                                                        <option selected>انتخاب کنید</option>
                                                                                                        ${
                                                                                                        data.data.map(function (item) {
                                                                                                            return `<option value="${item}">${item}</option>`
                                                                                                        })
                                                                                                    }
                                                                                                    `);

                    $('.attribute-select').select2({
                        tags: true
                    });
                }
            });
        }

        let createNewAttr = ({
            attributes,
            id
        }) => {
            return `
                                                                                                <div class="row" id="attribute-${id}">
                                                                                                    <div class="col-5">
                                                                                                        <div class="form-group">
                                                                                                             <label>عنوان ویژگی</label>
                                                                                                             <select name="attributes[${id}][name]" onchange="changeAttributeValues(event, ${id});" class="attribute-select form-control">
                                                                                                                <option value="">انتخاب کنید</option>
                                                                                                                ${
                                                                                                                    attributes.map(function(item) {
                                                                                                                        return `<option value="${item}">${item}</option>`
                                                                                                                    })
                                                                                                                }
                                                                                                             </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <div class="form-group">
                                                                                                             <label>مقدار ویژگی</label>
                                                                                                             <select name="attributes[${id}][value]" class="attribute-select form-control">
                                                                                                                    <option value="">انتخاب کنید</option>
                                                                                                             </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                     <div class="col-2">
                                                                                                        <label >اقدامات</label>
                                                                                                        <div>
                                                                                                            <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attribute-${id}').remove()">حذف</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            `
        }

        $('#add_product_attribute').click(function() {
            let attributesSection = $('#attribute_section');
            let id = attributesSection.children().length;

            attributesSection.append(
                createNewAttr({
                    attributes: [],
                    id
                })
            );

            $('.attribute-select').select2({
                tags: true
            });
        });

    </script>
@endsection
