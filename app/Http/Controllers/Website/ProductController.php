<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);

        return view('website.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('website.products.show', compact('product'));
    }

    public function changePriceCount(Request $request)
    {
        $product=Product::findOrFail($request->product_id);

        $product->options()->toggle($request->options);
    }
}
