<?php

namespace App\Http\Controllers\Auth;

use App\Code;
use App\Http\Controllers\Controller;
use App\Notifications\ActiveCodeNotification;
use App\Notifications\LoginWebsiteNotification;
use App\Providers\RouteServiceProvider;
use App\Rules\RecaptchaGoogle;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response'=>['required',new RecaptchaGoogle]
        ],[
            'g-recaptcha-response.required'=>'فیلد من ربات نیستم اجباری می باشد .'
        ]);
    }
    protected function authenticated(Request $request, $user)
    {
        if ($user->type !== 'off'){
            auth()->logout();
            $request->session()->flash('auth',[
                'user_id'=>$user->id,
                'sms'=>false,
                'remember'=>$request->has('remember')
            ]);

            if ($user->type === 'sms'){
                $code=Code::generateCode($user);
                $user->notify(new ActiveCodeNotification($code,$user->phone));
                $request->session()->push('auth.sms',true);
            }

            return redirect(route('verify.code.view'))->with('warning','کد پیامک شده را در اینجا وارد نمایید .');
        }
        else{

            return false;
        }
    }


}
