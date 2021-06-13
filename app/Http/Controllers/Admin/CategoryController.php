<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query=Category::query();

        if ($keyword=request()->get('search')){
            $query->where('title','LIKE',"%$keyword%")->orWhere('url','LIKE',"%$keyword%")->orWhere('label','LIKE',"%$keyword%");
        }
        $categories=$query->orderBy('created_at','DESC')->with('parent')->paginate(8);
        return  view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::getAllParent();
        return  view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $url = str_replace('-', '', $request->title);
        $url = str_replace(' ', '-', $url);
        $category = new Category();
        $category->title = $request->title;
        $category->label = $request->label;
        $category->parent_id = $request->parent_id;
        $category->url = $url;

        if ($request->has('file')) {
            $filename = 'icon-' . Str::random(16) . '.' . $request->file('file')->getClientOriginalExtension();
            if ($request->file('file')->move('upload', $filename)) {
                $category->icon = $filename;
            }
        }

        $category->save();

        return redirect(route('categories.index'))->with('success', 'دسته بندی  شما با موفقیت افزوده شد . ');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::getAllParent();
        $category=Category::findOrFail($id);
        return  view('admin.category.edit',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $url = str_replace('-', '', $request->title);
        $url = str_replace(' ', '-', $url);
        $category=Category::findOrFail($id);

        $category->title = $request->title;
        $category->label = $request->label;
        $category->parent_id = $request->parent_id;
        $category->url = $url;

        if ($request->has('file')) {
            $filename = 'icon-' . Str::random(16) . '.' . $request->file('file')->getClientOriginalExtension();
            if ($request->file('file')->move('upload', $filename)) {
                $category->icon = $filename;
            }
        }

        $category->save();

        return redirect(route('categories.index'))->with('info', 'دسته بندی  شما با موفقیت ابدیت شد . ');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();

        return redirect(route('categories.index'))->with('danger', 'دسته بندی  شما با موفقیت حذف شد . ');


    }
}