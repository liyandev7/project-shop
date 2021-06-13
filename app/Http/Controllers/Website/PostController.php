<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);

        return view('website.blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $posts = Post::latest()->get();
        return view('website.blog.single', compact('post', 'posts'));
    }
}