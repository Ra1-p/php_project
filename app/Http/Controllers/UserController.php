<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        $userData = request()->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users",
            "password" => "required|string|min:8", // Пароль должен быть длиной не менее 8 символов
            "check_password" => "required|string|same:password", // Проверка совпадения паролей
        ]);

        $userData['password'] = Hash::make($userData['password']);
        User::create($userData);
    }
    public function showRegistrationForm(){
        return view("user.create");
    }
}
