
@extends('tracks.layout')
@vite('resources/css/app.css')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Track list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary text-white" href="{{ route('tracks.create') }}"> Add new track</a>
            </div>
            <form class="text-right my-2 my-lg-0" >
                <div class = "form-group">

                    <input type="search" class = "form-control mr-sm-2" name="search" placeholder="Search(artist or track name)..." >
                </div>
                <button class="btn btn-secondary">Search</button>
            </form>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


        @foreach ($tracks as $track)
            <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card mb-5 shadow-lg" style="padding: 5px;height: 350px;width: 350px" >

                                <img src="{{asset('images/'.$track->cover_path)}}" class=" object-contain  img-fluid max-height:500px" style="width:400px ; height: 200px;" />

                                <div class="card-body" style="padding: 5px">
                                    <div class="card-title">
                                        <h5>{{$track->name}}</h5>
                                    </div>
                                    <div class="card-text">
                                        <h7>{{ $track->artist}}</h7>
                                    </div>
                                    <div class="card-text">
                                        <h7>{{ $track->genre}}</h7>
                                    </div>
                                    <form action="{{ route('tracks.destroy',$track->id) }}" method="POST">
                                        <a class="btn btn-secondary"  href="{{ route('tracks.show',$track->id) }}">Show</a>
                                        @if ($track->user_id == Auth::id() || \Illuminate\Support\Facades\Auth::user()->roles()->pluck('title')->contains('Admin'))
                                            <a class="btn btn-secondary" href="{{ route('tracks.edit',$track->id) }}">Edit</a>
                                        @endif
                                        @csrf
                                        @method('DELETE')
                                        @if ($track->user_id == Auth::id() || \Illuminate\Support\Facades\Auth::user()->roles()->pluck('title')->contains('Admin'))
                                            <button type="submit" class="btn btn-secondary">Delete</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
        @endforeach
@endsection

