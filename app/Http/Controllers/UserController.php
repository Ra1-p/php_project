<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateRequest;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class UserController extends Controller
{
    public function create(CreateRequest $request){
        $userData = $request->validated();

        $userData['password'] = Hash::make($userData['password']);

        /** @var User $model */
        $model = User::create($userData);
        if (!$model) {
            return redirect('register')->withErrors('Неизвестная ошибка, пожалуйста повторите попытку');
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
