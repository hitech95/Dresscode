<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    //Route::prefix('admin')->group(function () {
        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'Auth\LoginController@login');
        Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        //Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        //Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        //Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
        //Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset');

        Route::get('dashboard', 'DashboardController@showDashboard')->name('admin.dashboard');
    //});
});

Route::namespace('Frontend')->group(function () {
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('customer.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('customer.logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('customer.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    // User Routes...
    Route::get('profile', 'Profile\CustomerProfileController@showDashboard')->name('customer.profile');
    Route::get('profile/edit', 'Profile\CustomerProfileController@editDashboard')->name('customer.profile.edit');
    Route::patch('profile', 'Profile\CustomerProfileController@updateDashboard')->name('customer.profile.update');
    //Route::get('/addresses', 'Profile\CustomerAddressController@showAddresses')->name('customer.addresses');
    //Route::get('orders', 'Profile\CustomerOrderController@showOrders')->name('customer.orders');
    Route::get('tickets', 'Profile\CustomerTicketController@showMessages')->name('customer.tickets');

    Route::resource('addresses', 'Profile\CustomerAddressController', [
        'except' => [
            'show'
        ],
        'names' => [
            'index' => 'customer.addresses',
            'create' => 'customer.addresses.create',
            'edit' => 'customer.addresses.edit',
            'update' => 'customer.addresses.update',
            'store' => 'customer.addresses.store',
            'destroy' => 'customer.addresses.destroy',
        ]
    ]);

    Route::resource('orders', 'Profile\CustomerOrderController', [
        'only' => [
            'index', 'show'
            ],
        'names' => [
            'index' => 'customer.orders',
            'show' => 'customer.orders.show'
            ]
    ]);

    // Shop Routes...
    Route::get('/cart', 'Shop\CartController@showCart')->name('cart');
});
