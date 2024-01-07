<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function sendFriendRequest($friendId)
    {

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
        $data = $user->friend;
        $friends = array();
        foreach ($data as $friend)
        {
            array_push($friends, User::find($friend->friend_id));
        }
        return view('friend.list', compact('user', 'friends'));
    }


}
