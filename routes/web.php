<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'AuthController@showLoginForm');
Route::get('/register', 'UserController@showRegistrationForm')->name('register');
Route::post('/log', 'AuthController@login')->name('login');
Route::post('/register', 'UserController@create');

Route::get('/profile/{user}','ProfileController@show')->name('profile');
Route::get('/profile/{user}/edit','ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}/update','ProfileController@update')->name('profile.update');

// Route::post('/logout', 'LoginController@logout')->name('logout');
// Route::get('/profile', 'ProfileController@index')->middleware('auth');



Route::get('/', function () {
    return view('welcome');
});

