<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query=City::query();

        if ($keyword=request()->get('search')){
            $query->where('name','LIKE',"%$keyword%")->orWhere('label','LIKE',"%$keyword%");
        }
        $cities=$query->orderBy('created_at','DESC')->with('province')->paginate(8);
        return  view('admin.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces=Province::orderBy('name','ASC')->get();
        return  view('admin.city.create',compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $province=Province::findOrFail($request->province_id);

        $city=new City();
        $city->name=$request->name;
        $city->label=$request->label;


        $province->cities()->save($city);



        return redirect(route('cities.index'))->with('success','شهر شما با موفقیت افزوده شد . ');

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
        $city=City::findOrFail($id);

        $provinces=Province::orderBy('name','ASC')->get();

        return view('admin.city.edit',compact('city','provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $city=City::findOrFail($id);
        $province=Province::findOrFail($request->province_id);

        $city->name=$request->name;
        $city->label=$request->label;

        $province->cities()->save($city);

        return redirect(route('cities.index'))->with('info','شهر شما با موفقیت ابدیت شد . ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city=City::findOrFail($id);
        $city->delete();
        return redirect(route('cities.index'))->with('danger','شهر شما با موفقیت حذف شد . ');

    }
}
