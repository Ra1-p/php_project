<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return view("messages.list", compact('user'));
    }
}
