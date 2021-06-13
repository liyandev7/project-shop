<?php
namespace App\Http\Controllers\Website;

use App\City;
use App\Helpers\Cart\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use App\Province;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function cart()
    {
        return view('website.products.cart');
    }

    public function add(Product $product)
    {

        if (Cart::has($product)) {
            if (Cart::count($product) < $product->inventory) {
                Cart::update($product, 1);
            }

        } else {
            Cart::put(
                [
                    'quantity' => 1,
                ],
                $product
            );
        }

        alert()->success('محصول مورد نظر وارد سبد خرید شما شد .', 'پیغام موفقیت آمیز ');
        return redirect()->back();
    }

    public function quantityChange(Request $request)
    {
        $data = $request->validate([
            'quantity' => 'required',
            'id' => 'required',
//           'cart' => 'required'
        ]);

        if (Cart::has($data['id'])) {
            Cart::update($data['id'], [
                'quantity' => $data['quantity'],
            ]);

            return response(['status' => 'success']);
        }

        return response(['status' => 'error'], 404);
    }

    public function deleteFromCart($id)
    {
        Cart::delete($id);

        return back();
    }

    public function viewCheckout()
    {
        $cities = City::all();
        $provinces = Province::all();
        return view('website.products.checkout', compact('cities', 'provinces'));
    }
}