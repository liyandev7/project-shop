@extends('admin.layouts.master')

@section('title', 'صفحه اصلی - ابدیت کردن محصول ')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> ابدیت کردن محصول</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
                            <li class="breadcrumb-item active">ابدیت کردن محصول</li>
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
                        <h3 class="card-title">ابدیت کردن محصول</h3>
                    </div>


                </div>
                <div class="card-body">
                    <div id="attributes" data-attributes="{{ json_encode(\App\Attribute::all()->pluck('name')) }}"></div>
                    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="title">نام محصول </label>
                                    <input type="text" name="title" id="title"
                                        class="form-control form-control-sm @error('title') is-invalid @enderror"
                                        value="{{ old('title') ?? $product->title }}">


                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="count">تعداد محصول </label>
                                    <input type="number" name="count" id="count"
                                        class="form-control form-control-sm @error('count') is-invalid @enderror"
                                        value="{{ old('count') ?? $product->count }}">


                                    @error('count')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="view_count">بازدید محصول </label>
                                    <input type="number" name="view_count" id="view_count"
                                        class="form-control form-control-sm @error('view_count') is-invalid @enderror"
                                        value="{{ old('view_count') ?? $product->view_count }}">


                                    @error('view_count')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="category"> دسته بندی </label>

                                    <select name="category" id="category" class="form-control parent_id"
                                        style="width: 100%">

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->categories->find($category->id) ? 'selected' : '' }}>
                                                {{ $category->title }}</option>

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
                                    <label for="slider"> حالت اسلایدر </label>
                                    <select name="slider" id="slider" class="form-control">
                                        <option value="0">نباشد</option>
                                        <option value="1">باشد</option>
                                    </select>


                                    @error('slider')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="price">قیمت محصول </label>
                                    <input type="number" name="price" id="price"
                                        class="form-control form-control-sm @error('price') is-invalid @enderror"
                                        value="{{ old('price') ?? $product->price }}">


                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="description">توضیحات محصول </label>
                                    <textarea name="description" id="description" cols="30" rows="10"
                                        class="form-control">{{ old('description') ?? $product->description }}</textarea>


                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label>آپلود تصویر شاخص</label>
                                    <div class="input-group">
                                        <input src="{{ $product->image }}" type="text" id="image_label"
                                            class="form-control" name="image">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="button-image">انتخاب</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <div class="form-group">
                                    <label for="" class="col-sm-12 control-label">پیش نمایش تصویر : </label>
                                    <img src="{{ asset($product->image) }}" alt="" class="img-fluid" width="256">
                                </div>
                            </div>

                            <div class="col-md-7 m-auto">
                                <h6>ویژگی محصول</h6>
                                <hr>
                                <div id="attribute_section">
                                    @foreach ($product->attributes as $attribute)
                                        <div class="row" id="attribute-{{ $loop->index }}">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label>عنوان ویژگی</label>
                                                    <select name="attributes[{{ $loop->index }}][name]"
                                                        onchange="changeAttributeValues(event, {{ $loop->index }});"
                                                        class="attribute-select form-control">
                                                        <option value="">انتخاب کنید</option>
                                                        @foreach (\App\Attribute::all() as $attr)
                                                            <option value="{{ $attr->name }}"
                                                                {{ $attr->name == $attribute->name ? 'selected' : '' }}>
                                                                {{ $attr->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label>مقدار ویژگی</label>
                                                    <select name="attributes[{{ $loop->index }}][value]"
                                                        class="attribute-select form-control">
                                                        <option value="">انتخاب کنید</option>
                                                        @foreach ($attribute->values as $value)
                                                            <option value="{{ $value->value }}"
                                                                {{ $value->id === $attribute->pivot->value_id ? 'selected' : '' }}>
                                                                {{ $value->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label>اقدامات</label>
                                                <div>
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        onclick="document.getElementById('attribute-{{ $loop->index }}').remove()">حذف</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-sm btn-danger" type="button" id="add_product_attribute">ویژگی
                                    جدید</button>
                            </div>

                            <div class="col-md-7" style="margin: 35px auto">
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


            //
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
            //
            $.ajax({
                type: 'POST',
                url: '/admin/attribute/values',
                data: JSON.stringify({
                    name: event.target.value
                }),
                success: function(res) {
                    valueBox.html(`
                                                                                            <option value="" selected>انتخاب کنید</option>
                                                                                            ${
                                                                                            res.data.map(function (item) {
                                                                                                return `<option value="${item}">${item}</option>`
                                                                                            })
                                                                                        }
                                                                                        `);
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

            let attributes = $('#attributes').data('attributes');

            attributesSection.append(
                createNewAttr({
                    attributes,
                    id
                })
            );

            $('.attribute-select').select2({
                tags: true
            });
        });

        $('.attribute-select').select2({
            tags: true
        });

    </script>

@endsection
