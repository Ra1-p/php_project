<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        $userData = request()->validate([
            "fname" => "required|string",
            "lname"=> "nullable|string",
            "birthday"=> "nullable|date",
            "phone_number" => "nullable|string|max:15", // Может быть пустым, макимальная длина 15
            "email" => "required|email|unique:users",
            "password" => "required|string|min:8", // Пароль должен быть длиной не менее 8 символов
            "check_password" => "required|string|same:password", // Проверка совпадения паролей
        ]);

        $userData['password'] = Hash::make($userData['password']);
        $user = [
            'fname'=> $userData['fname'],
            'lname'=> $userData['lname'],
            'birthday'=> $userData['birthday'],
            'phone_number'=> $userData['phone_number'],
            'email'=> $userData['email'],
            'password'=> $userData['password'],
        ];
        User::create($userData);

        Auth::login($user['email'], passthru($user['password']));

        return redirect('/profile');
    }
    public function showRegistrationForm(){
        return view("user.create");
    }
}
