<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        // Проверяем, установлен ли remember cookie
        $remember = $request->filled('remember');

        // Получаем текущего аутентифицированного пользователя
        $user = $this->guard()->user();

        // Если пользователь выбрал "Remember Me", Laravel автоматически обработает токен
        if ($remember) {

        }

        // Измените редирект в зависимости от ваших потребностей
        return redirect()->route('profile', $user->getAuthIdentifier());
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->route('login')
        ->withErrors('Не правильно введеные учетные данные пользователя');
    }

    protected function authenticated(Request $request, User $user)
    {
        return redirect()->route('profile', $user->getAuthIdentifier());
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        if ($this->guard()->attempt($credentials, $request->filled('remember'))) {
            // Аутентификация прошла успешно, Laravel уже управляет всем необходимым
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }


}
