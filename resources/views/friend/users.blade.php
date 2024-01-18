@extends('layouts.main')

<section method='get'>

    <head>
        <title>{{ $user->profile->first_name }} Friends</title>
    </head>

    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg bg-light p-3 mb-4">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"
                                       href="{{ route('profile', auth()->user()->getAuthIdentifier()) }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">News</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle show" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                        Friends
                                    </a>
                                    <ul class="dropdown-menu show" data-bs-popper="static">
                                        <li><a class="dropdown-item" href="{{ route('friends', $user) }}">My friends</a></li>
                                        <li><a class="dropdown-item" href="#">Find friends</a></li>
                                        <li><a class="dropdown-item" href="{{ route('show.users', $user->id) }}">All users</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('messages.list', $user->id) }}">Messages</a>
                                </li>
                            </ul>
                        </div>
                        <form action="{{ route('logout') }}" method="post" class="d-flex">
                            @csrf
                            <button class="btn btn-outline-secondary" type="submit">Logout</button>
                        </form>
                    </div>
                </nav>

                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-8">
                                    <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                                @foreach($users as $friend)
                                    <div class="col-sm-8">
                                        <a class="mb-0" href="{{ route('profile', $friend->id) }}">
                                            @if($friend->profile->image)
                                                <img src="{{ Storage::url($friend->profile->image) }}" alt="avatar"
                                                     class="rounded-circle img-fluid" style="width: 50px;">
                                            @else
                                                <img src="https://ростр.рф/assets/img/no-profile.png" alt="avatar"
                                                     class="rounded-circle img-fluid" style="width: 50px;">
                                            @endif
                                            {{ $friend->profile->first_name }}
                                            {{ $friend->profile->last_name }}
                                        </a>
                                    </div>
                                    <div class="col-sm-4 mt-lg-3">
                                        <button class="btn btn-primary ">Add friend</button>
                                        <button class="btn btn-primary ">Send message</button>
                                    </div>
                                    <hr class="mt-2">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
