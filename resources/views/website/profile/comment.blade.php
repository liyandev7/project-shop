@extends('layouts.app')

@section('title', 'نظرات من')
@section('content')
    <div class="content">
        <section>
            <div class="bg-gradiant-account">
                <div class="area-shape-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                        <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
                    </svg>
                </div>
            </div>
        </section>
        <section class="mb-5 area-content-paccount">
            <div class="container">
                <div class="row">
                    @include('website.profile.sidebar')
                    <div class="col-12 col-lg-8">
                        <div class="tab-content tab-content-account-user " id="myTabContent">

                            <div class="tab-pane  show active" id="content2" role="tabpanel" aria-labelledby="comment-tab">



                                <div class="box-comments">
                                    @foreach (auth()->user()->comments as $comment)
                                        <div class="item-comment border-bottom pb-4 mb-4">
                                            <div class="star_rating-item-comment d-flex mb-3">

                                                <h6 class="nameproduct-in-star-rating">
                                                    <span>برای</span>
                                                    <a
                                                        href="{{ route('home.products.show', ['product' => $comment->commentable->id]) }}">
                                                        {{ $comment->commentable->title }}
                                                    </a>
                                                </h6>
                                            </div>
                                            <p class="mb-3">
                                                {{ $comment->text }}
                                            </p>

                                            <div class="porofile_customers-comment d-flex align-items-center">
                                                <img src="{{ $comment->user->image }}">
                                                <div class="porofileName">
                                                    <h6> {{ $comment->user->name }}</h6>
                                                    <span>
                                                        @php
                                                            $v = Verta::instance($comment->created_at);
                                                        @endphp
                                                        {{ $v->format('%B %d، %Y') }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach



                                </div>

                            </div>

                        </div>
                    </div>

        </section>
    </div>

@endsection
