<?php

namespace App\Http\Controllers\Auth;

use App\Code;
use App\Http\Controllers\Controller;
use App\Notifications\LoginWebsiteNotification;
use App\User;
use Illuminate\Http\Request;

class VerifyCodeController extends Controller
{
    public function viewVerify()
    {
        if (!session()->has('auth')){

            return redirect(route('login'));
        }
        session()->reflash();
        return  view('auth.verifyCode');
    }

    public function verifyCode(Request $request)
    {
        $data=$request->validate([
            'code'=>['required']
        ]);

        $user=User::findOrFail(session()->get('auth.user_id'));

       $status=Code::verifyCode($user,$data['code']);

       if ($status){
           auth()->loginUsingId($user->id);
           $user->codes()->delete();
           $user->notify(new LoginWebsiteNotification());
           return redirect()->route('home');
       }else{
           alert()->error('کد تایید اشتباه وارد کردید .','تلاش دوباره')->persistent('بسیار خب');
           return redirect()->route('login');
       }


    }
}
