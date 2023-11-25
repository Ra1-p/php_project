<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    use AuthenticatesUsers;
    public function show($userId){
        $user = User::find($userId);

        if (!$user) {
            abort(404); // или другая логика обработки отсутствующего пользователя
        }

        return view('user.profile', compact('user'));
    }
    public function edit(User $user){
        return view('user.editprofile', compact('user'));
    }

    public function update(User $user){
        $userData = request()->validate([
            "fname" => "sometimes|required|string",
            "lname"=> "sometimes|required|string",
            "email" => "sometimes|required|email",
            "phone_number"=> "sometimes|required|string",
            "image"=> "sometimes|required|string",
            "birthday"=> "sometimes|required|date",
            "location"=> "sometimes|required|string",

        ]);
        $user->update($userData);
        return redirect()->route("profile", $user->id);
    }
}
