@extends('layouts.withnav')
@section('content')
    <div class="text-light dashboard container py-4">
        <div class="row">
            <div class="col-sm-12 text-dark my-2">
                <div id="profile-img">
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control mb-2" placeholder="Your name" name="name"
                        value={{ old('name') }}>
                    <label for="floatingInput">Your name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control mb-2" placeholder="Username" name="username"
                        value={{ old('username') }}>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control mb-2" placeholder="Email" name="email"
                        value={{ old('email') }}>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control mb-2" placeholder="Password" name="password"
                        value={{ old('password') }}>
                    <label for="floatingInput">Password</label>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-info w-100 my-4">
                        Edit
                    </button>
                </div>
                <hr class="bg-danger">
                <form action="{{ route('logout') }}" method="POST" class="d-flex justify-content-end">
                    @csrf
                    <button class="btn btn-danger w-100 my-4">
                        Log out
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
