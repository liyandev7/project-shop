@extends('layouts.app')

@section('title', $post->title)

@section('content')


    <div class="content blog sidebar left-sidebar">
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 py-5">
                        <div class="area-content-bySidebar ">
                            <nav aria-label="breadcrumb" class="mb-4">
                                <ol class="breadcrumb breadcrumb-singleProduct ">
                                    <li class="breadcrumb-item"><a href="{{ route('website.home') }}">خانه</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">وبلاگ</a></li>
                                    <li class="breadcrumb-item active"> {{ $post->title }} </li>
                                </ol>
                            </nav>
                            <div class="title_site d-flex justify-content-start text-right">
                                <h1> {{ $post->title }} </h1>
                            </div>
                            <div
                                class="row d-flex justify-content-between  align-items-center  border-top border-bottom mb-4">
                                <div
                                    class="col-12 col-md-6 px-0 area-porofileAuthor-singlePost py-3  d-flex align-items-center justify-content-center justify-content-md-start mb-2 mb-md-0">
                                    <div class="porofile_author porofile_author-singlePost d-flex align-items-center ml-1">
                                        <a href="#"> <img class="imgAuthor" src="{{ $post->user->image}}" /></a>
                                        <div>
                                            <a href="#" class="porofileName"> {{ $post->user->name }}</a>
                                            <div class="area-infoPost d-flex justify-content-end align-items-center mt-2">
                                                <a class="message-link " href="#" title="">
                                                    <span>{{ $post->view_count }}</span>
                                                </a>
                                                <div class="border-left mx-3 mx-lg-2 mx-xl-3" style="height: 20px;">
                                                </div>
                                                <a title="{{ \Hekmatinasser\Verta\Verta::instance($post->created_at) }}"
                                                    class="data-link">
                                                    {{ \Hekmatinasser\Verta\Verta::instance($post->created_at) }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <p class="py-2 py-lg-3 mb-4">
                                {!! $post->description !!}
                            </p>


                            <div class="mb-0 mb-md-3 mt-5">
                                <h2 class="mb-3 heading-singlBlog">آخرین پست ها</h2>
                                <div class="owl-carousel slider-Related-posts ">
                                    @foreach ($posts as $post)
                                        <div class="item_slider-Related-posts">
                                            <div class="card">
                                                <div class="hover01 column">
                                                    <figure>
                                                        <img class="card-img-top" src="{{$post->image}}"
                                                            alt="Card image cap" />
                                                    </figure>
                                                </div>
                                                <div class="card-body">

                                                    <h2 class="title-post mb-3"><a
                                                            href="{{ route('blog.show', ['post' => $post->id]) }}">
                                                            {{ $post->title }}</a< /h2>
                                                            <div
                                                                class="porofile_author porofile_author-cardRelatedposts   mb-3">
                                                                <a href="#" class="d-flex align-items-center">
                                                                    <img class="imgAuthor"
                                                                        src="{{ $post->user->image }}">
                                                                    <div class="porofileName">
                                                                        <span>نویسنده:</span>
                                                                        <span>{{ $post->user->name }} </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div
                                                                class="area-infoPost d-flex justify-content-end align-items-center">
                                                                <a class="message-link " href="#" title="">
                                                                    <span>{{ $post->view_count }}</span>
                                                                </a>
                                                                <div class="border-left mx-3" style="height: 20px;"></div>
                                                                <a href="#"
                                                                    title="{{ \Hekmatinasser\Verta\Verta::instance($post->created_at) }}"
                                                                    class="data-link">
                                                                    {{ \Hekmatinasser\Verta\Verta::instance($post->created_at) }}
                                                                </a>
                                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
