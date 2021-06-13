<?php

namespace App\Http\Controllers\Website;

use App\Helpers\Cart\Cart;
use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->validate([
            'address' => ['required', 'max:191'],
            'phone' => ['required', 'max:11'],
            'province' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required', 'max:10'],
            'first_name' => ['string', 'max:191'],
            'last_name' => ['string', 'max:191'],
        ]);
        $cart = Cart::instance('cart');
        $cartItems = $cart->all();

        if ($cartItems->count()) {
            $price = $cartItems->sum(function ($cart) {
                return $cart['product']->price * $cart['quantity'];
            });

            $orderItems = $cartItems->mapWithKeys(function ($cart) {
                return [$cart['product']->id => ['quantity' => $cart['quantity']]];
            });

            if (auth()->user()->profile) {
                auth()->user()->profile()->update([
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                    'province_id' => $data['province'],
                    'city_id' => $data['city'],
                    'postal_code' => $data['postal_code'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                ]);

            } else {
                auth()->user()->profile()->create([
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                    'province_id' => $data['province'],
                    'city_id' => $data['city'],
                    'postal_code' => $data['postal_code'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                ]);

            }

            $order = auth()->user()->orders()->create([
                'status' => 'unpaid',
                'price' => $price,
            ]);

            $order->products()->attach($orderItems);

            $token = "c2019110a5acbebf63d11c7b3eaaee678a4bcd3745bdeaf8efd0e2a1e0c4b2db";
            $resNumber = Str::random(16);
            $args = [
                "amount" => $price,
                "payerName" => auth()->user()->name,
                "returnUrl" => route('profile.payment.callback'),
                "clientRefId" => $resNumber,
            ];

            $payment = new \PayPing\Payment($token);

            try {
                $payment->pay($args);
            } catch (Exception $e) {
                throw $e;
            }

            $order->payments()->create([
                'resnumber' => $args['clientRefId'],
                'price' => $price,
            ]);

            $cart->flush();

            return redirect($payment->getPayUrl());
        }

        alert()->error('مشکلی در عملیات پرداخت رخ داده است لطفا مجددا تلاش فرمایید . ', 'مشکلی یافت شد');
        return back();

    }

    public function callback(Request $request)
    {
        $payment = Payment::where('resnumber', $request->clientrefid)->firstOrFail();

        $token = "c2019110a5acbebf63d11c7b3eaaee678a4bcd3745bdeaf8efd0e2a1e0c4b2db";

        $payping = new \PayPing\Payment($token);

        try {
            // $payment->price
            if ($payping->verify($request->refid, $payment->price)) {
                $payment->update([
                    'status' => 1,
                ]);

                $payment->order()->update([
                    'status' => 'paid',
                ]);

                alert()->success('پرداخت شما موفق بود');
                return redirect('/');
            } else {
                alert()->error('پرداخت شما تایید نشد');
                return redirect('/');
            }
        } catch (\Exception $e) {
            $errors = collect(json_decode($e->getMessage(), true));

            alert()->error($errors->first());
            return redirect('/');
        }

    }

}