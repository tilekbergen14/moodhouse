@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <h4 class="text-light font-weight-bold text-center">Create new show!</h4>
        <form method="post" enctype="multipart/form-data" action="{{ route('createshow') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $show->id ?? null }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input value="{{ $show ? $show->name : old('name') }}" name='name' type="text" class="form-control"
                    placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Description</span>
                <textarea name='description' class="form-control" id="exampleFormControlTextarea1"
                    rows="10">{{ $show ? $show->description : old('description') }}</textarea>
            </div>
            <div class="multi-select">
                <div class="flex" id="result-box">
                    <input id="selectInput" class="select-input" type="text" placeholder="Select Categories"
                        autocomplete="off" />
                </div>
                <div class="select-list">
                    @foreach ($genres as $genre)
                        <option class="select-element" value="{{ $genre->genre }}">{{ $genre->genre }}</option>
                    @endforeach
                    <div class="btn btn-small btn-warning w-100" onclick="closeSelect()">Done</div>
                </div>
                <input type="hidden" value="{{ $show ? $show->genres : old('genres') }}" name="genres" id="resultInput" />
            </div>
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Released Year</span>
                <input value="{{ $show ? $show->released_year : old('released_year') }}" name='released_year' type="text"
                    class="form-control" placeholder="Released Year" aria-label="Released Year"
                    aria-describedby="addon-wrapping">
            </div>

            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Country</span>
                <input value="{{ $show ? $show->country : old('country') }}" name='country' type="text"
                    class="form-control" placeholder="Country">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Type</label>
                <select name='type' class="form-select" id="inputGroupSelect01">
                    <option {{ $show && $show->type === 'Movie' ? 'selected' : '' }} value="Movie">Movie</option>
                    <option {{ $show && $show->type === 'Serie' ? 'selected' : '' }} value="Serie">Serie</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Version</label>
                <select name='version' class="form-select" id="inputGroupSelect01">
                    <option value="Dub" {{ $show && $show->version === 'Dub' ? 'selected' : '' }}>Dub</option>
                    <option value="Sub" {{ $show && $show->version === 'Sub' ? 'selected' : '' }}>Sub</option>
                </select>
            </div>
            @if ($show && $show->image)
                <input type="hidden" value="{{ $show->image }}" name="existedImage">
                <img src="{{ $show->image }}" class="uploaded-img mb-4" alt="{{ $show->name }}">
            @endif
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3 flex-nowrap">
                <input type="file" class="form-control" id="file" name="image" />
                <label style="width: 120px" class="input-group-text"
                    for="inputGroupFile02">{{ $show && $show->image ? 'New image' : 'Image' }}</label>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select value="" name='status' class="form-select" id="inputGroupSelect01">
                    <option {{ $show && $show->status === 1 ? 'selected' : '' }} value="1">Ongoing</option>
                    <option {{ $show && $show->status === 0 ? 'selected' : '' }} value="0">Finished</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info w-100">{{ $show ? 'Edit' : 'Add new' }}</button>
        </form>
    </div>
@endsection
