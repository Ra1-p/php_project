<?php

namespace App\Services\Profile;


use Illuminate\Support\Facades\DB;

class Service
{

    public function update($request, $user)
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

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('profile/image', 'public');
                $profile->update(['image' => $path]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors('Произошла ошибка при обновлении данных пользовтаеля');
        }
    }
}
