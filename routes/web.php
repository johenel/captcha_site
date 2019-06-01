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

/* USER ROUETS */

Route::get('/activate-account', 'ActivateAccountController@index')->middleware('signedIn');

Route::group(['middleware' => ['signedIn', 'activated']], function () {
    Route::get('/typing-captcha', 'UsersController@typeCaptchaIndex');
    Route::post('/typing-captcha/attempt', 'UsersController@typeCaptcha');
    Route::get('/referrals', 'UsersController@referralsIndex');
});



//ADMIN ROUTES

Route::get('/dashboard', 'Admin\DashboardController@index')->middleware('admin');




