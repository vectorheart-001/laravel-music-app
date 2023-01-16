@extends('tracks.layout')
@vite('resources/css/app.css')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Track list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tracks.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table border-none">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Artist</th>
            <th width="280px">Posted by</th>
        </tr>
        @foreach ($tracks as $track)
            <tr>
                <td>{{ $track->id }}</td>
                <td>{{ $track->name }}</td>
                <td>{{ $track->artist}}</td>
                <td>{{ $track->user->name}}</td>
                <td>
                    <form action="{{ route('tracks.destroy',$track->id) }}" method="POST">
                        <button class="px-6 h-12 visibility: hidden; uppercase font-semibold tracking-wider border-2 border-black bg-teal-400 text-black"  href="{{ route('tracks.show',$track->id) }}">Show</button>
                        <button class="px-6 h-12 visibility: hidden; uppercase font-semibold tracking-wider border-2 border-black bg-teal-400 text-black" href="{{ route('tracks.edit',$track->id) }}">Edit</button>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 h-12 visibility: hidden; uppercase font-semibold tracking-wider border-2 border-black bg-teal-400 text-black">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $tracks->links() }}


@endsection
