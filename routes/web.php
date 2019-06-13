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

Route::post('/linehook', 'LineController@event');
Route::resource('/article', 'ArticleController')->middleware('auth');
Route::resource('/article', 'ArticleController')->middleware('auth')->middleware('blogger')->only('create', 'store', 'edit', 'update');

Route::post('/article/{article}/comment', 'CommentController@store');

Route::delete('/article/{article}/comment/{comment}', 'CommentController@destroy');

Route::get('/article/month/{month}', 'MonthController@show');

Route::get('/search', 'SearchController@index');

Route::get('/category', 'CategoryController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/subscribe', 'SubscribeController@index');

Route::post('/stripe/webhook', 'StripeWebhookController@handle');

//logout Route that I use in layout.blade.php
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/stripe', 'StripePaymentController@stripe')->middleware('auth');

Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post')->middleware('auth');



