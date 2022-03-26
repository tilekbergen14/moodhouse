@extends('layouts.admin')
@section('content')
    <div class="container-fluid my-4">
        <h4 class="text-light text-center font-weight-bold">Add new episode!</h4>
        <form method="post" enctype="multipart/form-data" action="{{ route('createshow') }}">
            @csrf
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group flex-nowrap my-3">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input value="" name='name' type="text" class="form-control" placeholder="Name" aria-label="Name"
                    aria-describedby="addon-wrapping">
            </div>
            <div>

            </div>
            <button type="submit" class="btn btn-info w-100">Add new</button>
        </form>
    </div>
@endsection
