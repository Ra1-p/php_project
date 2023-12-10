<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "user_id" => "nullable|integer",
            "first_name" => "required|string",
            "last_name"=> "nullable|string",
            "birthday"=> "nullable|date",
            "phone_number" => "nullable|string|max:15", // Может быть пустым, макимальная длина 15
            "email" => "required|email|unique:users",
            "password" => "required|string|min:8", // Пароль должен быть длиной не менее 8 символов
            "check_password" => "required|string|same:password", // Проверка совпадения паролей
        ];
    }
}
