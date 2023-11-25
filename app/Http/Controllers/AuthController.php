<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/login';


    public function showLoginForm(){
        return view("user.index");
    }

    public function login(){

        $userData = request()->validate([
            "email" => "required|email",
            "password" => "required|string|min:8", // Пароль должен быть длиной не менее 8 символов
        ]);

        // Проверка наличия пользователя
        $user = User::where('email', $userData['email'])->first();

        if ($user) {

            // Проверка пароля
            if (Hash::check($userData["password"], $user->password)) {
                // Пароль совпадает, перенаправляем на страницу профиля
                $userId = $user->id;
                return redirect()->route('profile', [$userId]);
            } else {
                // Пароль не совпадает
                return redirect('/login')->with('error', 'Неправильные учетные данные');
            }
        } else {
            // Пользователь не найден, возвращаем его на страницу входа
            return redirect('/login')->with('error', 'Неправильные учетные данные');
        }
    }
}
