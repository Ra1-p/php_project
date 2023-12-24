<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateRequest;
use App\Profile;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;



class UserController extends Controller
{
    use AuthenticatesUsers;
    public function create(CreateRequest $request)
    {
        $userData = $request->validated();

        $userData['password'] = Hash::make($userData['password']);

        /** @var User $model */
        $model = User::create($userData);
        if (!$model) {
            return redirect('register')->withErrors('Неизвестная ошибка, пожалуйста повторите попытку');
        }

        $profileData = [
            "user_id" => $model->id,
            "first_name" => $userData["first_name"],
            "last_name" => $userData["last_name"],
            "birthday" => $userData["birthday"],
        ];

        /** @var Profile $profile */
        $profile = Profile::query()->firstOrCreate($profileData);
        if ($profile){
            $this->attemptLogin($request);
            return redirect()->route('profile', $model->id);
        } else {
            return redirect('register')->withErrors('Неизвестная ошибка, пожалуйста повторите попытку');
        }

    }
    public function showRegistrationForm(){
        return view("user.create");
    }
}
