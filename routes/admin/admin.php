<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::prefix('location')->group(function () {
        Route::resource('provinces', 'ProvinceController');
        Route::resource('cities', 'CityController');
        Route::resource('areas', 'AreaController');
    });

    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('comments', 'CommentController');
    Route::resource('services', 'ServiceController');
    Route::resource('orders', 'OrderController');
    Route::resource('peyments', 'PeymentController');
    Route::resource('blogs', 'BlogController');
    Route::resource('fonts', 'FontController');
    Route::resource('options', 'OptionController');

    Route::prefix('orders')->group(function () {
        Route::get('/details/{user}', 'OrderController@userShow')->name('orders.user.show');
    });
    Route::resource('users', 'UserController');
    Route::resource('settings', 'SettingController');
    Route::resource('brands', 'BrandController');
    Route::resource('contacts', 'ContactController');
    Route::post('/contacts', 'ContactController@store')->name('contacts.store.admin');
    Route::get('/contacts/{contact}', 'ContactController@viewEmail')->name('contact.email');

    Route::get('/profile', 'ProfileController@index')->name('profile.home');
    Route::get('/profile/managetwofactor', 'ProfileController@viewManageTwoFactor')->name('profile.manage.2fa.view');
    Route::post('/profile/managetwofactor', 'ProfileController@manageTwoFactor')->name('profile.manage.2fa');
    Route::get('/profile/managetwofactor/verify/code', 'ProfileController@viewVerifyCode')->name('profile.manage.view.verify.code');
    Route::post('/profile/managetwofactor/verify/code', 'ProfileController@verifyCode')->name('profile.manage.verify.code');

});
