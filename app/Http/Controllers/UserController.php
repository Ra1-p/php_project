<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class UserController extends Controller
{
    public function create(Request $request){
        $userData = $request->validate([
            "user_id" => "nullable|integer",
            "first_name" => "required|string",
            "last_name"=> "nullable|string",
            "birthday"=> "nullable|date",
            "phone_number" => "nullable|string|max:15", // Может быть пустым, макимальная длина 15
            "email" => "required|email|unique:users",
            "password" => "required|string|min:8", // Пароль должен быть длиной не менее 8 символов
            "check_password" => "required|string|same:password", // Проверка совпадения паролей
        ]);

        $userData['password'] = Hash::make($userData['password']);

        /** @var User $model */
        $model = User::create($userData);
        if (!$model) {
            return redirect('register')->withErrors('Пользователь с данным email-ом уже существует');
        }

        $userData["user_id"] = $model->id;
        $request->session()->put('profile_data', $userData);

        return redirect()->route('target.profile');
//        Auth::login($model, passthru($model->password));
//
//        return redirect('/profile');
    }
    public function showRegistrationForm(){
        return view("user.create");
    }
}
