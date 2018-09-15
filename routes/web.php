<?php

use App\User;
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
})->name('/');
Route::get('/login', function () {
    return view('user.login');
})->name('user/login');
Route::get('/user/dashboard',function(){

    return view('user.dashboard');


})->name('user/dashboard');
Route::get('/admin/dashboard',function(){


    $users = User::all();
    return view('admin.dashboard')->with('users',$users);


});
Route::get('/register','RegisterController@register')->name('register');
Route::post('/register','RegisterController@store');
Route::get('/user/login','LoginController@userlogin')->name('user/login');
Route::post('/user/login','LoginController@validateuser');
Route::get('/admin/login','AdminController@login')->name('admin/login');
Route::post('/admin/login','AdminController@index');
Route::post('/approve-user','AdminController@approval');