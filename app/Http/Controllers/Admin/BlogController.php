<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Post::query();

        if ($keyword = request()->get('search')) {
            $query->where('title', 'LIKE', "%$keyword%")->orWhere('view_count', 'LIKE', "%$keyword%")->orWhere('description', 'LIKE', "%$keyword%");
        }
        $blogs = $query->orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.post.index', compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'description' => $data['description'],
            'image' => $data['image'],
            'view_count' => $request->view_count,
        ]);

        return redirect()->route('blogs.index')->with('success', 'پست شما با موفقیت ایجاد شد .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

        $post = Post::findOrFail($id);

        $post->update([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'description' => $data['description'],
            'image' => $data['image'],
            'view_count' => $request->view_count,
        ]);
        return redirect()->route('blogs.index')->with('info', 'پست شما با موفقیت ابدیت شد .');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('blogs.index')->with('danger', 'پست شما با موفقیت حذف  شد .');

    }
}