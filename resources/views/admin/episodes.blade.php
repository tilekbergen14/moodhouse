@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <form action="{{ route('episodes') }}">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Show</label>
                <select name='show_id' class="form-select" id="inputGroupSelect01">
                    <option value={{ null }}>
                        All</option>
                    @foreach ($shows as $show)
                        <option {{ $search === $show->id ? 'selected' : '' }} value={{ $show->id }}>
                            {{ $show->name }} </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-warning ms-2">Search</button>
            </div>
        </form>
        <div class="d-flex justify-content-between mb-3" style="height: 35px">
            <div class="input-group" style="width: auto">

            </div>
            <form action="{{ route('createepisode') }}">
                <button class="btn btn-primary">Create new episode</button>
            </form>
        </div>
        <div style="width: 100%; overflow: auto">
            <table class="text-light table rounded">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col" style="text-align: end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($episodes as $episode)
                        <tr>
                            <td scope="row" style="width: 150px">
                                <div class="list-img rounded">
                                    <img class="list-img rounded" src="{{ $episode->parent()->image }}" alt="No Image">
                                </div>
                            </td>
                            <td scope="row" class="w-100 text-ellipsis">{{ $episode->parent()->name }}
                                EP{{ $episode->episode }}
                            </td>

                            <td scope="row" style="width: max-content">
                                <div class="d-flex">
                                    <form action="{{ route('episode_delete', $episode) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <form action="{{ route('createepisode') }}" method="get">
                                        <input type="hidden" name='id' value="{{ $episode->id }}">
                                        <button type="submit" class="btn btn-warning ms-2">Edit</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $episodes->links() }}
            </div>
        </div>
    </div>
@endsection
