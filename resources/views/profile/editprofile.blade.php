@extends('layouts.main')

<head>
    <title>Edit profile</title>
</head>

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit profile data</p>

                                <form action="{{ route('profile.update', $user->id) }}" method="post"
                                      class="mx-1 mx-md-4">
                                    @csrf
                                    @method('patch')
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input name="fname" type="text" id="form3Example1c" class="form-control"
                                                   value="{{ $user->fname }}"/>
                                            <label class="form-label" for="form3Example1c">Your First Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input name="lname" type="text" id="form3Example1c" class="form-control"
                                                   value="{{ $user->lname }}"/>
                                            <label class="form-label" for="form3Example1c">Your Last Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input name="birthday" type="date" id="form3Example1c" class="form-control"
                                                   value="{{ old('birthday', $user->birthday ?? '') }}">
                                            <label for="birthday">Birth Date</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input name="phone_number" type="tel" id="phone" class="form-control"
                                                   pattern="+[7]{1}([0-9]){3}-[0-9]{3}-[0-9]{2}-[0-9]{2}"
                                                   placeholder="+7(700)-000-00-00" value="{{ $user->phone_number}}">
                                            <label for="phone">Phone number</label>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input name="email" type="email" id="form3Example3c" class="form-control"
                                                   value="{{ $user->email }}"/>
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Edit</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
