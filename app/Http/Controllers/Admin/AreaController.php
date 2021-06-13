<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query=Area::query();

        if ($keyword=request()->get('search')){
            $query->where('name','LIKE',"%$keyword%")->orWhere('label','LIKE',"%$keyword%");
        }

        $areas=$query->latest()->paginate(8);
        return view('admin.area.index',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::orderBy('name','ASC')->get();

        return view('admin.area.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $city=City::findOrFail($request->city_id);

        $area=new Area();

        $area->name=$request->name;
        $area->label=$request->label;

        $city->areas()->save($area);
        return redirect(route('areas.index'))->with('success','منطقه شما با موفقیت اضافه شد . ');


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
        $cities=City::orderBy('name','ASC')->get();
        $area=Area::findOrFail($id);

        return view('admin.area.edit',compact('cities','area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        $city=City::findOrFail($request->city_id);

        $area=Area::findOrFail($id);

        $area->name=$request->name;
        $area->label=$request->label;

        $city->areas()->save($area);
        return redirect(route('areas.index'))->with('info','منطقه شما با موفقیت ابدیت شد . ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area=Area::findOrFail($id);

        $area->delete();

        return redirect(route('areas.index'))->with('danger','منطقه شما با موفقیت حذف شد . ');
    }
}
