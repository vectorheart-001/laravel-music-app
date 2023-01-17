@extends('tracks.layout')
@vite('resources/css/app.css')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show track</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tracks.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="flex p-6 font-mono h-full  bg-gray-500 " >
        <div class="flex-none w-48 mb-10 relative z-10 before:absolute before:top-1 before:left-1 before:w-full before:h-full before:bg-teal-400">
            <img src="{{asset('images/'.$track->cover_path)}}" alt="Image" class="absolute z-10 inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
        </div>
        <form class="flex-auto space-x-4 pl-6">
            <div class="relative p-8 flex flex-wrap items-baseline pb-6 before:bg-black before:absolute before:-top-6 before:bottom-0 before:-left-60 before:-right-6">
                <h1 class="relative w-full flex-none mb-2 text-2xl font-semibold text-white">
                    {{ $track->name }}
                </h1>
                <div class="relative text-lg text-white">
                    {{ $track->artist }}
                </div>


            </div>
            <div class="relative text-lg text-white">
                {{ $track->track_link }}
            </div>
            <button class="px-6 h-12 visibility: hidden; uppercase font-semibold tracking-wider border-2 border-black bg-teal-400 text-black" type="submit">
                Buy now
            </button>


        </form>
    </div>



    <form action="{{ route('comments.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Comment:</strong>
                    <input type="text" name="comment" class="form-control" placeholder="Comment">
                    <input type="hidden" value="{{$track->id}}" name="track_id">
                </div>
            </div>
        </div>
        @if ($track->user_id == Auth::id())
            <button type="submit" class="btn btn-danger">Post</button>
        @endif


            <table class="table border-none">
                @foreach ($track->comments as $comment)
                    <tr>
                        <td>
                            <h3>{{$comment->user->name}}</h3>
                            <p>{{$comment->content}}</p>
                        </td>

                    </tr>
        @endforeach

    </form>

@endsection
