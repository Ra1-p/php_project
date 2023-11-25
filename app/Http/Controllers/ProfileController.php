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
        $profile = User::find($userId);

        if (!$profile) {
            abort(404); // или другая логика обработки отсутствующего пользователя
        }

        return view('user.profile', compact('profile'));
    }
    public function edit(User $user){
        return view('user.editprofile', compact('user'));
    }

    public function update(User $user){
        $userData = request()->validate([
            "name" => "string",
            "email" => "required|email",
        ]);
        $user->update($userData);
        return redirect()->route("profile", $user->id);
    }
}
