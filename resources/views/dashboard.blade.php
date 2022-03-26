@extends('layouts.withnav')
@section('content')
    <div class="text-light dashboard container py-4">
        <div class="row">
            <div class="col-sm-12 my-2 text-dark">
                <div class="profile-img-box mb-4 d-flex m-auto">
                    <img class="h-100 w-100 rounde" src="/images/thumbnails/1647698310tanjiro.jpg" alt="Image">
                </div>
                <div class="input-group mb-2">
                    <input name='image' type="file" class="form-control" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
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
                    <button class="btn btn-info my-4 w-100">
                        Edit
                    </button>
                </div>
                <hr class="bg-danger">
                <form action="{{ route('logout') }}" method="POST" class="d-flex justify-content-end">
                    @csrf
                    <button class="btn btn-danger my-4 w-100">
                        Log out
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
