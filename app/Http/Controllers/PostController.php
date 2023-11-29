<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $page = \request()->get('page');
        $user = \request()->user();

        $query = Post::query()->with(['author.profile']);

    }
}
