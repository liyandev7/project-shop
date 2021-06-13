<?php

namespace App\Http\Controllers\Website;

use App\Bank;
use App\City;
use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $states = Province::all();
        $cities = City::all();
        return view('website.profile.index', compact('states', 'cities'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'city_id' => ['required'],
            'province_id' => ['required'],
            'address' => ['required'],
            'postal_code' => ['required'],
            'phone' => ['required'],
        ]);

        auth()->user()->profile()->create($request->all());
        alert()->success('پروفایل شما با موفقیت بروزرسانی شد .', 'پیغام موفقیت آمیز');
        return redirect()->back();
    }

    public function viewComments()
    {

        return view('website.profile.comment');
    }

    public function viewBank()
    {
        return view('website.profile.bank');
    }

    public function bank(Request $request)
    {

        $data = $request->validate([
            'name' => ['required'],
            'bank_name' => ['required'],
            'bank_number' => ['required'],
            'number_cart' => ['required'],
            'shaba' => ['required'],
        ]);

        if ($bank = Bank::where('user_id', auth()->user()->id)->with('user')->first()) {
            $bank->update([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'bank_name' => $data['bank_name'],
                'bank_number' => $data['bank_number'],
                'number_cart' => $data['number_cart'],
                'shaba' => $data['shaba'],
            ]);
        } else {
            auth()->user()->create($data);

        }

        alert()->success('شماره حساب شما با موفقیت بروزرسانی شد .', 'پیغام موفقیت آمیز');
        return redirect()->back();

    }

    public function orders()
    {
        $orders = auth()->user()->orders;

        return view('website.profile.order', compact('orders'));

    }
}