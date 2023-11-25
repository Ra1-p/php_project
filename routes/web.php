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
// Ссылка на форму входа в учетную запись пользователя
Route::get('/login', 'AuthController@showLoginForm');
Route::post('/log', 'AuthController@login')->name('login');
// Ссылка на форму регистрации в учетную запись пользователя
Route::get('/register', 'UserController@showRegistrationForm')->name('register');
Route::post('/register', 'UserController@create');

// Ссылки на профиль пользователя
Route::get('/profile/{user}','ProfileController@show')->name('profile');
// Ссылки на изменение и редактиврование данных пользователя профиль пользователя
Route::get('/profile/{user}/edit','ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}/update','ProfileController@update')->name('profile.update');

Route::get('/messages','MessageController@index');

// Route::post('/logout', 'LoginController@logout')->name('logout');
// Route::get('/profile', 'ProfileController@index')->middleware('auth');



Route::get('/', function () {
    return view('welcome');
});

