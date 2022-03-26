@extends("layouts.app")

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container bg-light p-2 rounded" style="max-width: 500px">
            <form action="{{ route('login') }}" method='POST' class="text-center">
                @csrf
                <div class="mb-2">
                    <a class="navbar-brand" href="/">MoodHouse</a>
                </div>
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                @error('email')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="email" class="form-control mb-2 @error('email') border border-danger @enderror"
                        placeholder="Your email" name="email" value={{ old('email') }}>
                    <label for="floatingInput">Your email</label>
                </div>
                @error('password')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="password" class="form-control mb-2 @error('password') border border-danger @enderror"
                        placeholder="Your name" name="password" value={{ old('password') }}>
                    <label for="floatingInput">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="on" name='remember'> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <div class="my-2">Don't have an account? <a href="{{ route('register') }}">Sign up</a></div>
            </form>
        </div>
    </div>
@endsection
