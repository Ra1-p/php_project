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
        $friends = $user->friend;
        $fr = array();
        foreach ($friends as $friend)
        {
            array_push($fr, User::find($friend->friend_id));
        }
        return view('friend.list', compact('user', 'fr'));
    }


}
