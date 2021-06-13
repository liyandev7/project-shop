<?php

namespace App\Http\Controllers\Website;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $brands = Brand::latest()->take(11)->get();
        return view('website.about.index',compact('brands'));
    }
}
