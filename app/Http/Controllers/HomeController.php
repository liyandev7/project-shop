<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Comment;
use App\Product;
use App\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function landing()
    {
        $brands = Brand::latest()->take(11)->get();
        $comments = Comment::latest()->get();
        $services = Service::all();
        $product = Product::where('slider', 1)->first();
        return view('landing.home', compact('services', 'comments', 'brands', 'product'));

    }
    public function comment(Request $request)
    {
        $data = $request->validate([
            'commentable_id' => ['required'],
            'commentable_type' => ['required'],
            'parent_id' => ['required'],
            'text' => ['required', 'max:191'],
        ]);

        auth()->user()->comments()->create($data);

        alert()->success('نظر شما با موفقیت ثبت گردید .', 'پیغام موفقیت آمیز');
        return redirect()->back();
    }
}