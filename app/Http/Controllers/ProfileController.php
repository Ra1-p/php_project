<?php


namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    use AuthenticatesUsers;

    public function index(Request $request)
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
        return view('profile.editprofile', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        DB::beginTransaction();

        try {
            $user->update([
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number')
            ]);

            $profile = $user->profile();
            $profile->update([
                'first_name' => $request->input('first_name'),
                'last_name' =>$request->input('last_name'),
                'birthday' => $request->input('birthday'),
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors('Произошла ошибка при обновлении данных пользовтаеля');
        }

        return redirect()->route("profile", $user->id);
    }
}
