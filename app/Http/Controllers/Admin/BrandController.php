<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Brand::query();

        if ($keyword = request()->get('search')) {
            $query->where('name', 'LIKE', "%$keyword%");
        }
        $brands = $query->orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.brand.index', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'name' => ['required'],
            'url' => ['required'],
            'image' => ['required'],

        ]);

        Brand::create($data);

        return redirect(route('brands.index'))->with('success', 'برند شما با موفقیت اضافه گردید . ');
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
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name' => ['required'],
            'url' => ['required'],
            'image' => ['required'],

        ]);

        $brand->update($data);

        return redirect(route('brands.index'))->with('info', 'برند شما با موفقیت آبدیت گردید . ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect(route('brands.index'))->with('danger', 'برند شما با موفقیت حذف گردید . ');

    }
}