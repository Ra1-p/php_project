<?php

use Illuminate\Support\Facades\Route;



// Ссылка на форму входа в учетную запись пользователя
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Ссылка на форму регистрации в учетную запись пользователя
Route::get('/register', [\App\Http\Controllers\UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\UserController::class, 'create']);

// Ссылки на профиль пользователя
Route::get('/', [\App\Http\Controllers\ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/{id}',[\App\Http\Controllers\ProfileController::class, 'show'])->name('profile')->middleware('auth');

// Ссылки на изменение и редактиврование данных пользователя профиль пользователя
Route::get('/profile/{user}/edit',[\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}/update',[\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// Ссылки на получение, добавление и удаления в списке друзей
Route::post('/friend/send/{friendId}', [\App\Http\Controllers\FriendController::class, 'sendFriendRequest'])->name('friend.send')->middleware('auth');
Route::post('/friend/accept/{friendId}', [\App\Http\Controllers\FriendController::class, 'acceptFriendRequest'])->name('friend.accept')->middleware('auth');
Route::post('/friend/cancel/{friendId}', [\App\Http\Controllers\FriendController::class, 'cancelFriendRequest'])->name('friend.cancel')->middleware('auth');
Route::get('/friends/{id}', [\App\Http\Controllers\FriendController::class, 'getFriends'])->name('friends')->middleware('auth');


Route::get('/messages' ,[\App\Http\Controllers\MessageController::class, 'index'])->name('messages.list')->middleware('auth');



// Route::post('/logout', 'LoginController@logout')->name('logout');
// Route::get('/profile', 'ProfileController@index')->middleware('auth');



