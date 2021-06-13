<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query=Filter::query();

        if($keyword=request()->get('search')){
            $query->where('filter_name','LIKE',"%$keyword%")->orWhere('filter_text','LIKE',"%$keyword%");
        }

        $filters=$query->latest()->paginate(8);

        return view('admin.filter.index',compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('title','ASC')->get();

        return view('admin.filter.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterRequest $request)
    {
        $category=Category::findOrFail($request->category_id);
        $filter=new Filter();
        $filter->filter_type=$request->filter_type;
        $filter->filter_validation=$request->filter_validation;
        $filter->filter_text=$request->filter_text;
        $filter->filter_name=$request->filter_name;

        $category->filters()->save($filter);

        return redirect(route('filters.index'))->with('success','فیلتر شما با موفقیت افزوده شد .');


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
        $filter=Filter::findOrFail($id);
        $categories=Category::orderBy('title','ASC')->get();

        return view('admin.filter.edit',compact('filter','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilterRequest $request, $id)
    {
        $filter=Filter::findOrFail($id);
        $category=Category::findOrFail($request->category_id);
        $filter->filter_type=$request->filter_type;
        $filter->filter_validation=$request->filter_validation;
        $filter->filter_text=$request->filter_text;
        $filter->filter_name=$request->filter_name;
        $category->filters()->save($filter);
        return redirect(route('filters.index'))->with('info','فیلتر شما با موفقیت ابدیت شد .');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filter=Filter::findOrFail($id);
        $filter->delete();

        return redirect(route('filters.index'))->with('danger','فیلتر شما با موفقیت حذف شد .');

    }
}
