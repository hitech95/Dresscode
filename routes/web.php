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
    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    });


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
    Route::get('profile', 'EmployeeController@showCurrentEmployee')->name('admin.profile');

    Route::resource('shops', 'ShopController', ['names' => [
        'index' => 'admin.shops',
        'show' => 'admin.shop.show',
        'create' => 'admin.shop.create',
        'store' => 'admin.shop.store',
        'edit' => 'admin.shop.edit',
        'update' => 'admin.shop.update',
        'destroy' => 'admin.shop.destroy',
    ]]);

    Route::resource('brands', 'BrandController', ['names' => [
        'index' => 'admin.brands',
        'show' => 'admin.brand.show',
        'create' => 'admin.brand.create',
        'store' => 'admin.brand.store',
        'edit' => 'admin.brand.edit',
        'update' => 'admin.brand.update',
        'destroy' => 'admin.brand.destroy',
    ]]);
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
    Route::get('dashboard', 'Profile\CustomerProfileController@showDashboard')->name('customer.dashboard');
    Route::get('profile', 'Profile\CustomerProfileController@editProfile')->name('customer.profile');
    Route::patch('profile', 'Profile\CustomerProfileController@updateProfile')->name('customer.profile.update');
    //Route::get('/addresses', 'Profile\CustomerAddressController@showAddresses')->name('customer.addresses');
    //Route::get('orders', 'Profile\CustomerOrderController@showOrders')->name('customer.orders');

    Route::resource('tickets', 'Profile\CustomerTicketController', [
        'only' => [
            'index', 'show', 'create', 'store', 'update'
        ],
        'names' => [
            'index' => 'customer.tickets',
            'show' => 'customer.tickets.show',
            'create' => 'customer.tickets.create',
            'store' => 'customer.tickets.store',
            'update' => 'customer.tickets.update',
        ]
    ]);
    Route::get('tickets/{id}/close', 'Profile\CustomerTicketController@close')->name('customer.tickets.close');
    Route::get('tickets/{id}/open', 'Profile\CustomerTicketController@open')->name('customer.tickets.open');

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
    Route::get('addresses/{id}/default', 'Profile\CustomerAddressController@markDefault')->name('customer.addresses.default');

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
