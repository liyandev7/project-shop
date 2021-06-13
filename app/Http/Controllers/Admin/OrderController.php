<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Order;
use App\Province;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Order::query();

        if ($keyword = request()->get('search')) {
            $query->where('price', 'LIKE', "%$keyword%");
        }
        $orders = $query->orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.create', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = $this->validate($request, [
            'status' => ['required', 'in:unpaid,paid,preparation,posted,received,canceled'],
            'tracking_serial' => 'required',
        ]);

        $order->update($data);

        return redirect(route('orders.index'))->with('info', 'سفارش شما با موفقیت ابدیت شد .');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route('orders.index'))->with('danger', 'سفارش شما با موفقیت حذف شد .');

    }

    public function userShow(User $user)
    {
        $city = City::where('id', $user->profile->city_id)->first();
        $province = Province::where('id', $user->profile->province_id)->first();
        return view('admin.orders.show-user', compact('user', 'city', 'province'));
    }
}