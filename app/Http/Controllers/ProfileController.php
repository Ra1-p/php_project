<?php


namespace App\Http\Controllers;

use App\Friend;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return redirect()->route('profile', Auth::id());
    }
    public function show($id)
    {
        /** @var User $user */
        $user = User::query()->with('profile')->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Пользователя с такими учетными данным не существует'); // или другая логика обработки отсутствующего пользователя
        }
        return view('profile.profile', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->service->update($request, $user);

        return redirect()->route("profile", $user->id);
    }
}
