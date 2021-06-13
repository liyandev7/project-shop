<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\ResponseTicketEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query=Contact::query();

        if ($keyword=request()->get('search')){
            $query->where('name','LIKE',"%$keyword%")->orWhere('phone','LIKE',"%$keyword%")->orWhere('subject','LIKE',"%$keyword%")->orWhere('email','LIKE',"%$keyword%");
        }
        $contacts=$query->orderBy('created_at','DESC')->where('status',1)->paginate(8);
        return  view('admin.contact.index',compact('contacts'));
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

       $data= $request->validate([
            'description'=>['required'],
           'email'=>['required'],
           'subject'=>['required']
        ]);



       Contact::create([
           'name'=>auth()->user()->name,
           'email'=>auth()->user()->email,
           'phone'=>auth()->user()->phone,
           'subject'=>"جواب دادن به ایمیل : $request->email",
           'reverse_email'=>$data['email'],
           'message'=>$data['description'],
           'status'=>2
       ]);

       Mail::to($data['email'])->send(new ResponseTicketEmail($data['subject'],$data['description']));

       return redirect(route('contacts.index'))->with('success','ایمیل شما با موفقیت ارسال شد .');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect(route('contacts.index'))->with('danger','عملیات شما با موفقیت انجام شد و ایتم با موفقیت حذف شد .');
    }

    public function viewEmail(Contact $contact)
    {

        return view('admin.contact.create',compact('contact'));
    }
}
