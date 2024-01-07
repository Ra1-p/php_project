@extends('layouts.main')
@section('profile')



    <section method='get' , style="background-color: #eee;">
        <head>
            <title>{{ $user->profile->first_name }} Profile</title>
        </head>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg bg-light p-3 mb-4">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('profile', $user->id) }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">News</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route('friends', $user) }}">Friend list</a>
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
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            @if($user->profile->image)
                                <img src="{{ Storage::url($user->profile->image) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            @else
                                <img src="https://ростр.рф/assets/img/no-profile.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            @endif
                            <h5 class="my-3">{{ $user->profile->first_name }} {{ $user->profile->last_name}}</h5>
                            <p class="text-muted mb-4">{{ $user->location}}</p>
                            <div class="d-flex justify-content-center mb-2">
                                @if(auth()->check() && $user->profile && auth()->user()->getAuthIdentifier() === $user->id)
                                <a href="{{ route('profile.edit', $user->id) }}">
                                    <button type="button" class="btn btn-primary">Edit </button>
                                </a>
                                @else
                                <a href="#">
                                    <button type="button" class="btn btn-primary ms-1">Follow</button>
                                </a>
                                @endif
                                <a href="{{ route('messages.list', $user->id) }}">
                                    <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->profile->first_name }} {{ $user->profile->last_name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->phone_number}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">(098) 765-4321</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p type="phone" class="text-muted mb-0">{{ $user->profile->location}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
