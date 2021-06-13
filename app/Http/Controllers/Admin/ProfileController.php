<?php

namespace App\Http\Controllers\Admin;

use App\Code;
use App\Http\Controllers\Controller;
use App\Notifications\ActiveCodeNotification;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function viewManageTwoFactor()
    {
        return view('admin.profile.manage');
    }

    public function manageTwoFactor(Request $request)
    {

        $data = $request->validate([
            'type' => 'in:off,sms',
            'phone' => 'required_unless:type,off',
        ]);

        session()->flash('phone', $data['phone']);

        if ($data['type'] === 'sms') {
            if (auth()->user()->phone !== $data['phone']) {
                $code = Code::generateCode(auth()->user());
                auth()->user()->notify(new ActiveCodeNotification($code,$data['phone']));
                return redirect(route('profile.manage.view.verify.code'));
            } else {
                auth()->user()->update([
                    'type' => 'sms',
                ]);
            }
        }
        if ($data['type'] === 'off') {
            auth()->user()->update([
                'type' => 'off',
            ]);

            return redirect()->back()->with('info', 'اطلاعات شما با موفقیت بروز رسانی شد .');

        }

        return redirect()->back()->with('info', 'اطلاعات شما با موفقیت بروز رسانی شد .');
    }

    public function viewVerifyCode()
    {
        if (session()->has('phone')) {
            session()->reflash();
            return view('admin.profile.verify-code');

        } else {
            return redirect(route('profile.manage.2fa.view'))->with('error', 'مشکل در عملیات بروز سانی پروفایل شما . لطفا مجددا تلاش فرمایید .');
        }
    }

    public function verifyCode(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'max:6'],
        ]);

        $status = Code::verifyCode(auth()->user(), $data['code']);

        if ($status) {
            auth()->user()->codes()->delete();

            auth()->user()->update([
                'phone' => $request->session()->get('phone'),
                'type' => 'sms',
            ]);

            return redirect(route('profile.manage.2fa.view'))->with('success', 'پروفایل شما با موفقیت بروز رسانی شد .');
        } else {
            return redirect(route('profile.manage.2fa.view'))->with('error', 'مشکل در بروز رسانی پروفایل شما مجددا تلاش فرمایید .');
        }

    }
}
