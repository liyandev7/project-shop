<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = User::query();

        if ($keyword = request()->get('search')) {
            $query->where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->orWhere('phone', 'LIKE', "%$keyword%");
        }
        $users = $query->orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->sttaf = $request->role;
        $user->password = Hash::make($request->phone);

        if ($request->has('file')) {
            $filename = 'icon-' . Str::random(16) . '.' . $request->file('file')->getClientOriginalExtension();
            if ($request->file('file')->move('upload', $filename)) {
                $user->image = $filename;
            }
        }

        $user->save();

        return redirect(route('users.index'))->with('success', 'کاربر شما با موفقیت ثبت گردید .');
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
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
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
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->sttaf = $request->role;

        if ($request->has($user->password)) {
            $user->password = $request->password;
        }

        if ($request->has('file')) {
            $filename = 'icon-' . Str::random(16) . '.' . $request->file('file')->getClientOriginalExtension();
            if ($request->file('file')->move('upload', $filename)) {
                $user->image = $filename;
            }
        }

        $user->update();

        return redirect(route('users.index'))->with('info', ' کاربر   شما با موفقیت ابدیت شد . ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('users.index'))->with('danger', ' کاربر   شما با موفقیت حذف شد . ');

    }
}