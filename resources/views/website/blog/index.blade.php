@extends('layouts.app')
@section('title', 'بلاگ صفحه اصلی ')
@section('content')

    <div class="content blog sidebar left-sidebar list">
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="py-5 col-lg-9">
                        <div class="area-content-bySidebar ">
                            <nav aria-label="breadcrumb" class="mb-4">
                                <ol class="breadcrumb breadcrumb-singleProduct ">
                                    <li class="breadcrumb-item"><a href="{{ route('website.home') }}">خانه</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">وبلاگ</a></li>

                                </ol>
                            </nav>
                            <div class="title_site d-flex justify-content-start">
                                <h1>بلاگ</h1>
                            </div>
                            <div class="mb-0 area-all-post mb-md-3">
                                <div class="row">
                                    @foreach ($posts as $post)
                                        @if ($loop->index % 2 == 0)
                                            <div class="pb-2 mb-4 col-12">
                                                <article class="card card-post d-flex flex-column flex-sm-row">
                                                    <div class="hover01 column">
                                                        <figure><a href="{{ route('blog.show', ['post' => $post->id]) }}"
                                                                class="card-img d-block"><img
                                                                    src="{{ $post->image }}"
                                                                    class="img-fluid h-100" /></a>
                                                        </figure>
                                                    </div>
                                                    <!-- <div class="hover01"> <figure> <a href="#" class="card-img d-block"><img src="images/img-post1.jpg" class="img-fluid h-100" ></a></figure> </div> -->
                                                    <div class="card-body">

                                                        <h2 class="mb-2 title-post mb-md-4"><a
                                                                href="{{ route('blog.show', ['post' => $post->id]) }}">
                                                                {{ $post->title }}
                                                            </a></h2>
                                                        <div class="mb-4 porofile_author porofile_author-listPost">
                                                            <a href="#" class="d-flex align-items-center">
                                                                <img class="imgAuthor" src="{{ $post->user->image }}" />
                                                                <div class="porofileName">
                                                                    <span>نویسنده:</span>
                                                                    <span>

                                                                        {{ $post->user->name }}
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="area-infoPost d-flex justify-content-end align-items-center">
                                                            <a class="message-link " title="">
                                                                <span>{{ $post->view_count }}</span>
                                                            </a>
                                                            <div class="border-divider"></div>
                                                            <a title="\Hekmatinasser\Verta\Verta::instance($post->created_at)"
                                                                class="data-link">
                                                                {{ \Hekmatinasser\Verta\Verta::instance($post->created_at) }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        @else
                                            <div class="pb-2 mb-4 col-12">
                                                <article
                                                    class="card card-post card-post-conversely d-flex flex-column flex-sm-row">
                                                    <div class="order-2 card-body order-sm-1">

                                                        <h2 class="mb-4 title-post"><a
                                                                href="{{ route('blog.show', ['post' => $post->id]) }}">
                                                                {{ $post->title }}</a></h2>
                                                        <div class="mb-4 porofile porofile_author">
                                                            <a href="#" class="d-flex align-items-center">
                                                                <img class="imgPorofile"
                                                                    src="{{ $post->user->image }}" />
                                                                <div class="porofileName">
                                                                    <span>نویسنده:</span>
                                                                    <span> {{ $post->user->name }}</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="area-infoPost d-flex justify-content-end align-items-center">
                                                            <a class="message-link " href="#" title="">
                                                                <span>{{ $post->view_count }}</span>
                                                            </a>
                                                            <div class="border-divider"></div>
                                                            <a title="{{ \Hekmatinasser\Verta\Verta::instance($post->created_at) }}"
                                                                class="data-link">
                                                                {{ \Hekmatinasser\Verta\Verta::instance($post->created_at) }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="order-1 hover01 column order-sm-2">
                                                        <figure><a class="card-img d-block"><img
                                                                    src="{{ $post->image }}"
                                                                    class="img-fluid h-100" /></a>
                                                        </figure>
                                                    </div>
                                                </article>
                                            </div>
                                        @endif


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
