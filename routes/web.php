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


Route::prefix('admin')->group(function () {
    // Authentication Routes...
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login_admin');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::get('logout', 'Admin\Auth\LoginController@logout')->name('logout_admin');
    // Registration Routes...
    Route::get('register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('register_admin');
    Route::post('register', 'Admin\Auth\RegisterController@register');
    // Password Reset Routes...
    Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset');

    Route::get('dashboard', 'Admin\DashboardController@showDashboard')->name('dashboard_admin');
});

// Authentication Routes...
Route::get('login', 'Frontend\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Frontend\Auth\LoginController@login');
Route::get('logout', 'Frontend\Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Frontend\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Frontend\Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Frontend\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Frontend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Frontend\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Frontend\Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
