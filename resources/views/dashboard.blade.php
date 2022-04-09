@extends('layouts.withnav')
@section('content')
    <div class="text-light dashboard container py-4">
        <div class="row">
            <div class="col-sm-12 text-dark my-2">
                <form action="{{route("user-update", auth()->user())}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div id="profile-img" data-profile="{{auth()->user()->profile}}" style="width: 100%; aspect-ratio: 16 / 9" class="mb-4">
                    </div>
                    @error('name')
                        <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                    @enderror
                    <div class="form-floating">
                        <input type="text" class="form-control mb-2" placeholder="Your name" name="name"
                            value="{{ auth()->user()->name }}">
                        <label for="floatingInput">Your name</label>
                    </div>
                    @error('username')
                        <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                    @enderror
                    <div class="form-floating">
                        <input type="text" class="form-control mb-2" placeholder="Username" name="username"
                        value="{{ auth()->user()->username }}">
                        <label for="floatingInput">Username</label>
                    </div>
                    @error('email')
                        <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                    @enderror
                    <div class="form-floating">
                        <input type="email" class="form-control mb-2" placeholder="Email" name="email"
                        value="{{ auth()->user()->email }}">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-info w-100 my-4">
                            Save
                        </button>
                    </div>
                </form>
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
