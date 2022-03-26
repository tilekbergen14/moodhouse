@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username"
                aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="button">Search</button>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-3" style="height: 35px">
            <div class="input-group" style="width: auto">
                {{-- <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                </div> --}}
                <select class="custom-select" id="inputGroupSelect01">
                    <option value="1">All</option>
                    <option value="2">Ongoing</option>
                    <option value="2">Completed</option>
                </select>
            </div>
            <form action="{{ route('createshow') }}">
                <button class="btn btn-primary">Create new show</button>
            </form>
        </div>
        <div style="width: 100%; overflow: auto">
            <table class="text-light table rounded">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col" style="text-align: end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shows as $show)
                        <tr>
                            <td scope="row" style="width: 150px">
                                <div class="list-img rounded">
                                    <img class="list-img rounded" src="{{ $show->image }}" alt="No Image">
                                </div>
                            </td>
                            <td scope="row" class="w-100 text-ellipsis">{{ $show->name }}
                            </td>
                            <td scope="row" style="width: 250px">{{ $show->status ? 'Ongoing' : 'Finished' }}</td>
                            <td scope="row" style="width: max-content">
                                <div class="d-flex">
                                    <form action="{{ route('show', $show) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <form action="{{ route('createshow') }}" method="get">
                                        <input type="hidden" name='id' value="{{ $show->id }}">
                                        <button type="submit" class="btn btn-warning ms-2">Edit</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $shows->links() }}
            </div>
        </div>
    </div>
@endsection
