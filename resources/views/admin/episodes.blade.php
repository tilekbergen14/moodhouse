@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <h4 class="text-light font-weight-bold text-center">Create new episode!</h4>
        <form method="post" enctype="multipart/form-data" action="{{ route('createepisode') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $episode->id ?? null }}">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select value="" name='status' class="form-select" id="inputGroupSelect01">
                    <option {{ $episode && $episode->status === 1 ? 'selected' : '' }} value="1">Ongoing</option>
                    <option {{ $episode && $episode->status === 0 ? 'selected' : '' }} value="0">Finished</option>
                </select>
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input value="{{ $episode ? $episode->name : old('name') }}" name='name' type="text" class="form-control"
                    placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping">
            </div>
            @if ($episode && $episode->image)
                <input type="hidden" value="{{ $episode->image }}" name="existedImage">
                <img src="{{ $episode->image }}" class="uploaded-img mb-4" alt="{{ $episode->name }}">
            @endif
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3 flex-nowrap">
                <input type="file" class="form-control" id="file" name="image" />
                <label style="width: 120px" class="input-group-text"
                    for="inputGroupFile02">{{ $episode && $episode->image ? 'New image' : 'Image' }}</label>
            </div>

            <button type="submit" class="btn btn-info w-100">{{ $episode ? 'Edit' : 'Add new' }}</button>
        </form>
    </div>
@endsection
