<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function sendFriendRequest($friendId)
    {
        // Логика отправки запроса на дружбу
    }

    public function acceptFriendRequest($friendId)
    {
        // Логика принятия запроса на дружбу
    }

    public function cancelFriendRequest($friendId)
    {
        // Логика отмены запроса на дружбу
    }

    public function getFriends()
    {
        // Логика получения списка друзей
    }

}
