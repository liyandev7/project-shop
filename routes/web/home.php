<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     $product = Product::find(3);

//     dd($product->comments()->get());
// });

Auth::routes();
Route::get('/auth', function () {
    return Auth::loginUsingId(1);
});
Route::get('/shop', 'HomeController@index')->name('website.shop');
Route::post('/comments', 'HomeController@comment')->name('website.comment');
Route::get('/', 'HomeController@landing')->name('website.home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect(\route('website.home'));
});

Route::prefix('/auth')->namespace('Auth')->group(function () {
    Route::post('/verify/code', 'VerifyCodeController@verifyCode')->name('verify.code.sms');
    Route::get('/verify', 'VerifyCodeController@viewVerify')->name('verify.code.view');
    Route::get('/google/callback', 'GoogleController@callback')->name('google.callback');
    Route::get('/google/redirect', 'GoogleController@redirect')->name('google.redirect');
});

Route::prefix('/')->namespace('Website')->group(function () {
    Route::patch('product/option/price', 'ProductController@changePriceCount');
    Route::post('/checkout', 'ProfileController@store')->name('profile.checkout');
    Route::get('/payment/callback', 'ProfileController@callback')->name('profile.payment.callback');
    Route::get('/products', 'ProductController@index')->name('home.products.index');
    Route::get('/products/carts', 'CartController@cart')->name('cart');
    Route::get('/products/{product}', 'ProductController@show')->name('home.products.show');
    Route::post('/products/cart/add/{product}', 'CartController@add')->name('cart.add.product');
    Route::patch('cart/quantity/change', 'CartController@quantityChange');

    Route::delete('cart/delete/{cart}', 'CartController@deleteFromCart')->name('cart.destroy');
    Route::get('/checkout', 'CartController@viewCheckout')->name('cart.checkout');
    Route::get('/contacts', 'ContactController@viewContact')->name('contact.view');
    Route::get('/about', 'AboutController@about')->name('about');
    Route::post('/contacts', 'ContactController@store')->name('contact');
    Route::get('/profile', 'AccountController@index')->name('profile.website');
    Route::get('/profile/orders', 'AccountController@orders')->name('profile.website.orders');
    Route::post('/profile', 'AccountController@store')->name('profile.information.store');
    Route::get('/profile/comments', 'AccountController@viewComments')->name('profile.comments');
    Route::get('/profile/bank', 'AccountController@viewBank')->name('profile.bank');
    Route::post('/profile/bank', 'AccountController@bank')->name('profile.bank.store');

    Route::get('/posts', 'PostController@index')->name('blog.index');
    Route::get('/posts/{post}', 'PostController@show')->name('blog.show');

    Route::get('/migrate', function () {
        return Artisan::call('artisan migrate');
    });


    Route::get('/font',function(){
        return view('test');
    });

});
