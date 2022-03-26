@extends("layouts.app")

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container bg-light p-2 rounded" style="max-width: 500px">
            <form action="{{ route('register') }}" method='POST' class="text-center">
                @csrf
                <div class="mb-2">
                    <a class="navbar-brand" href="/">MoodHouse</a>
                </div>
                @error('name')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="text" class="mb-2 form-control @error('name') border border-danger @enderror "
                        placeholder="Your name" name="name" value={{ old('name') }}>
                    <label for="floatingInput">Your name</label>
                </div>
                @error('username')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="text" class="mb-2 form-control @error('username') border border-danger @enderror"
                        placeholder="Username" name="username" value={{ old('username') }}>
                    <label for="floatingInput">Username</label>
                </div>
                @error('email')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="email" class="mb-2 form-control @error('email') border border-danger @enderror"
                        placeholder="Your email" name="email" value={{ old('email') }}>
                    <label for="floatingInput">Your email</label>
                </div>
                @error('password')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="password" class="mb-2 form-control @error('password') border border-danger @enderror"
                        placeholder="Your name" name="password" value={{ old('password') }}>
                    <label for="floatingInput">Password</label>
                </div>
                @error('password')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="password" class="mb-2 form-control @error('password') border border-danger @enderror"
                        placeholder="Confirm password" name="password_confirmation"
                        value={{ old('password_confirmation') }}>
                    <label for="floatingInput">Confirm password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input name='remember' type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <div class="my-2">Don't have an account? <a href="{{ route('login') }}">Sign in</a></div>

            </form>
        </div>
    </div>
@endsection
