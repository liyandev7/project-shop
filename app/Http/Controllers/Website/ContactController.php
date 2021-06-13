<?php

namespace App\Http\Controllers\Website;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function viewContact()
    {
        $setting=Setting::findOrFail(1);
        return view('website.contact.index',compact('setting'));
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>['required'] ,
            'email'=>['email','required'] ,
            'phone'=>['required','max:11'],
            'subject'=>['required'],
            'message'=>['required']
        ]);

        Contact::create($data);

        alert()->success('پیام شما ارسال شد 1 الی 2 روز کاری زمان میبرد تا پاسخ گو شما باشیم از ارسال پیام شما متشکریم','پیغام موفقیت آمیز')->persistent('بسیار خب');

        return redirect()->back();
    }
}
