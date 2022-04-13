@extends('layouts.app')

@section('content')
    <div class="header">
        <img class="header-img" src="/images/static/movie.jpg" alt="">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">MoodHouse</a>
                @auth
                    <form class="d-flex" action="{{ route('dashboard') }}" method="get">
                        <button style="z-index: 3" class="btn btn-primary" type="submit">{{ auth()->user()->name }}</button>
                    </form>
                @endauth
                @guest
                    <form class="d-flex" action="{{ route('login') }}" method="get">
                        <button style="z-index: 3" class="btn btn-primary" type="submit">SIGN IN</button>
                    </form>
                @endguest

            </div>
        </nav>
        <div class='welcome'>
            @component('components.slider', ['contents' => $shows])
            @endcomponent
        </div>
    </div>
    <div class="text-light hero py-4 px-2">
        <div class="left-side container">
            <div class="d-flex justify-content-between align-items-center my-2">
                <p class="title">LATEST SHOWS</p>
                <a href="{{ route('home') }}">
                    <p class="title">SEE MORE
                        <i class="fa-solid fa-angles-right"></i>
                    </p>
                </a>
            </div>
            <div class="row m-0">
                @if (session('episodes'))
                    @foreach (session('episodes') as $episode)
                        @component('components.card', ['content' => $episode])
                            {{ $episode }}
                        @endcomponent
                    @endforeach
                @else
                    @foreach ($episodes as $episode)
                        @component('components.card', ['content' => $episode])
                            {{ $episode }}
                        @endcomponent
                    @endforeach
                @endif
            </div>
            <div class="d-flex justify-content-center">
                {{ $episodes->links() }}
            </div>
        </div>
        {{-- <div class="right-side text-light">
            <p class="title tablet-none">Filter</p>
            <form class="filter-box" action="{{ route('home') }}" method="POST">
                @csrf
                <div class="d-flex">
                    <div class="flex-fill">
                        <p class="text-info mb-1">Genres</p>

                        @foreach ($genres as $genre)
                            <input type="checkbox" id="romance" value="{{ $genre->genre }}"
                                @if (is_array(old('cgenres')) && in_array($genre->genre, old('cgenres'))) checked @endif name="cgenres[]">
                            <label for="romance">{{ $genre->genre }}</label><br>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 w-100">Filter</button>
            </form>
        </div> --}}
    </div>

    <div class="footer border-top">
        <div class="container">
            <footer class="py-4">
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a href="#" class="nav-link text-light px-2">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light px-2">FAQ</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light px-2">News</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light px-2">Contact</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light px-2">Work</a></li>
                </ul>
                <p class="text-light m-0 text-center">© 2022 Moodhouse</p>
            </footer>
        </div>
    </div>
@endsection
