@extends('layouts.withnav')
@section('content')
    <div class="text-light container my-4">
        <div class="show-hero"> <img class="rounded" src="{{ $show->image }}" alt="profile"
                style="width: 100%; aspect-ratio: 16 / 9">
        </div>
        {{-- <div class="row">
            <div class="col-4">
                <img class="rounded" src="{{ $show->image }}" alt="profile"
                    style="width: 100%; aspect-ratio: 9/ 12">

            </div>
            <div class="col-8">
                <h4 class="card-title font-weight-bold">{{ $show->name }}</h4>
                <p class="secondary-text">{{ $show->description }}</p>
                <p><span class="card-title">Genres: </span><span class="secondary-text">{{ $show->genres }}</span></p>
                <p><span class="card-title">Released Year: </span><span
                        class="secondary-text">{{ $show->released_year }}</span></p>
                <p><span class="card-title">Country: </span><span class="secondary-text">{{ $show->country }}</span>
                </p>
                <p><span class="card-title">Version: </span><span class="secondary-text">{{ $show->version }}</span>
                </p>
                <h3 class="card-title font-weight-bold mt-2">Leave your comment!</h3>
                <textarea style="width: 100%" name="" id="" cols="30" rows="10"></textarea>
                <button class="btn btn-warning w-100 mt-2">Comment</button>
            </div>
        </div> --}}
    </div>
@endsection
