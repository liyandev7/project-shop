<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->email)->first();
            if ($user) {
                Auth::loginUsingId($user->id);
                return redirect(route('home'));
            } else {
                $newUser = User::create([
                    'email' => $googleUser->email,
                    'name' => $googleUser->name,
                    'image' => $googleUser->avatar,
                    'password' => Hash::make(Str::random(16)),
                ]);

                Auth::loginUsingId($newUser->id);
                return redirect(route('home'));

            }
            return redirect('/');
        } catch (\Throwable $th) {
            alert()->error('مشکل در عدم اتصال به سرویس گوگل رخ داده است . مجددا تلاش فرمایید ', 'اروری رخ داده است ');
            return redirect(route('login'));

        }

    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
}