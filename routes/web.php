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
Route::get('/user/dashboard',function(){

    return view('user.dashboard');


});
Route::get('/admin/dashboard',function(){

    return view('admin.dashboard');


});
Route::get('/register','RegisterController@register')->name('register');
Route::post('/register','RegisterController@store');