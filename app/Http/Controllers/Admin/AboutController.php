<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about=About::findOrFail(1);
        $services=Service::latest()->take(5)->get();
        return view('admin.about.create',compact('about','services'));
    }
}
