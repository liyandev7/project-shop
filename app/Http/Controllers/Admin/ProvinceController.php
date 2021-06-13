<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query=Province::query();

        if ($keyword=request()->get('search')){
            $query->where('name',"LIKE","%$keyword%")->orWhere('label','LIKE',"%$keyword%");
        }
        $provinces=$query->orderBy('created_at','DESC')->paginate(8);
        return  view('admin.province.index',compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        $province=new Province();

        $province->name=$request->name;
        $province->label=$request->label;

        $province->save();

        return redirect(route('provinces.index'))->with('success','استان شما با موفقیت افزوده شد . ');
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
        $province=Province::findOrFail($id);
        return view('admin.province.edit',compact('province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, $id)
    {
        $province=Province::findOrFail($id);
        $province->update([
            'name'=>$request->name,
            'label'=>$request->label
        ]);

        return redirect(route('provinces.index'))->with('info','استان شما با موفقیت ابدیت شد . ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province=Province::findOrFail($id);
        $province->delete();
        return redirect(route('provinces.index'))->with('danger','استان شما با موفقیت حذف شد . ');


    }
}
