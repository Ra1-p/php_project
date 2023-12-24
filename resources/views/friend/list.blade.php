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
                                       href="{{ route('profile', $user->id) }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">News</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('friends', $user->id) }}">Friend list</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('messages.list', $user->id) }}">Messages</a>
                                </li>
                            </ul>
                        </div>
                        <form action="{{ route('logout') }}" method="post" class="d-flex" role="search">
                            @csrf
                            <button class="btn btn-outline-secondary" type="submit">Logout</button>
                        </form>
                    </div>
                </nav>

                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                @foreach($fr as $friend)
                                    <div class="col-sm-8">
                                        @if($friend->profile->image)
                                            <img src="{{ Storage::url($friend->profile->image) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 50px;">
                                        @else
                                            <img src="https://ростр.рф/assets/img/no-profile.png" alt="avatar" class="rounded-circle img-fluid" style="width: 50px;">
                                        @endif
                                        <a class="mb-0" href="{{ route('profile', $friend->id) }}">
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
