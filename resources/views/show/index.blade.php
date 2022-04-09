@extends('layouts.withnav')
@section('content')
    <div class="text-light">
        <div class="show-hero">
            <img class="show-profile rounded" src="{{ $show->image }}" alt="profile">
            <div class="show-hero-info">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title font-weight-bold">{{ $show->name }}</h4>
                    {{-- <button class="btn btn-danger">Add to Favs</button> --}}
                </div>
                <p class="secondary-text">{{ $show->description }}</p>
                <p><span class="card-title">Genres: </span><span class="secondary-text">{{ $show->genres }}</span></p>
                <p><span class="card-title">Released Year: </span><span
                        class="secondary-text">{{ $show->released_year }}</span></p>
                <p><span class="card-title">Country: </span><span class="secondary-text">{{ $show->country }}</span>
                </p>
                <p><span class="card-title">Version: </span><span class="secondary-text">{{ $show->version }}</span>
                </p>
                <h5 class="card-title font-weight-bold mt-2">Leave your comment!</h5>

                <form action="{{ route('comment', $show) }}" method="POST">
                    @csrf
                    <textarea value="{{ old('value') }}" style="width: 100%" name="body" id="" cols="30" rows="10"></textarea>
                    <button class="btn btn-warning w-100 my-2">
                        Comment
                    </button>
                </form>
  
                <hr>
                <div class="comment-body">
                    @foreach ($show->comments as $comment)
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ $comment->user->profile}}" alt="{{ $comment->user->name[0] }}" class="comment-user-profile">
                                <div>
                                    <p class="title-blue m-0">{{ $comment->user->name }}</p>
                                    <p class="text-muted m-0">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            @auth
                                @if ($comment->user->id === auth()->user()->id)
                                    <form action="{{ route('comment', $comment) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button
                                            class="fa-solid fa-trash text-danger c-pointer m-2 border-0 bg-transparent"></button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                        <p class="fst-italic fw-light m-0">{{ $comment->body }}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
