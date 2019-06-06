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

Route::resource('/article', 'ArticleController');
Route::post('/article/{article}/comment', 'CommentController@store');
Route::delete('/article/{article}/comment/{comment}', 'CommentController@destroy')->middleware('auth');
Route::get('/search', 'SearchController@index');
Route::get('/category', 'CategoryController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//logout Route that I use in layout.blade.php
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/linehook', 'Linecontroller@event', compact('Request'));

