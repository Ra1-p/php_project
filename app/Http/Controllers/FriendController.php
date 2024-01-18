<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class FriendController extends Controller
{

    public function sendFriendRequest($friendId, Request $request)
    {

        $user = $request->user();
        $friend = User::find($friendId);
        if (!$friend) {
            return redirect()->route('friends', $user->id);
        }
        if ($user->friend->friend_id === $friendId && $user->friend->user_id === $user->id ){
            return redirect()->back()->withErrors('Пользователь добавлен в друзья.');
        }
        $user->friend()->attach($friend);
        return redirect()->back()->with('success', 'Пользователь добавлен в друзья.');
    }

    public function acceptFriendRequest($friendId)
    {
        // Логика принятия запроса на дружбу
    }

    public function cancelFriendRequest($friendId)
    {
        // Логика отмены запроса на дружбу
    }

    public function getFriends($id)
    {
        $user = User::find($id);
        $data = $user->friends;
        $friends = array();
        foreach ($data as $friend)
        {
            array_push($friends, User::find($friend->friend_id));
        }
        return view('friend.list', compact('user', 'friends'));
    }

    public function showAllUsers($id)
    {
        $user = User::find($id);
        $users = User::all();
        return view('friend.users', compact('user', 'users'));
    }


}
