@extends('layouts.app')
@section('title','404')
@section('content')
    <div class="content">
        <div class="container ">
            <div class="row">
                <div class="area-content-P404 col-12 d-flex justify-content-center flex-column align-items-center py-5">
                    <h1 class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        <img class="img-fluid" src="{{asset('/website/images/img404.svg')}}" />
                        <span class="text-center d-inline-block text-danger mt-2">خطای کد: 404</span>
                    </h1>
                    <h2 class="title404 mb-2">اوه صفحه پیدا نشد!</h2>
                    <p class="mb-4"> به نظر می رسد ما نمی توانیم صفحه مورد نظر را پیدا کنیم.</p>
                    <div class=" mb-4 pb-2">
                        <a href="{{route('website.home')}}"
                           class="ml-4 button-outline button-outline-P404"> برگشت به صفحه اصلی</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


