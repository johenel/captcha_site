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

Route::get('/', 'HomeController@index')->middleware('filterGuest');
Route::get('/signup', ['as' => 'register', 'uses' => 'SignupController@index']);
Route::post('/signup', 'SignupController@attempt');
Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::post('/login', 'LoginController@attempt');
Route::get('/logout', 'LogoutController@logout');
Route::get('/forgot-password', 'ForgotPasswordController@index');
Route::post('/forgot-password', 'ForgotPasswordController@forgotPassword');

Route::get('/forgot-password/{token}', 'ForgotPasswordController@updatePassIndex');
Route::post('/forgot-password/update', 'ForgotPasswordController@updatePass');

/* USER ROUETS */

Route::get('/activate-account', 'ActivateAccountController@index')->middleware('signedIn');
Route::post('/activation-payment-details', 'ActivateAccountController@submitPaymentDetails');

Route::group(['middleware' => ['signedIn', 'activated']], function () {
    Route::get('/typing-captcha', 'UsersController@typeCaptchaIndex');
    Route::post('/typing-captcha/attempt', 'UsersController@typeCaptcha');
    Route::get('/referrals', 'UsersController@referralsIndex');
    Route::get('/encashment', 'UsersController@encashmentIndex');
});

//ADMIN ROUTES

Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index');
    Route::get('/users', 'Admin\UsersController@index');
    Route::get('/activation-request/{id}', 'Admin\ActivateAccountController@index');
    route::post('/activation-request/action', 'Admin\ActivateAccountController@apdRequestAction');
});




