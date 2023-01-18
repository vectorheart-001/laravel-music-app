@extends('tracks.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tracks.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    <strong>Artist:</strong>
                    <input type="text" name="artist" class="form-control" placeholder="Artist">
                    <strong>Album:</strong>
                    <input type="text" name="album" class="form-control" placeholder="Album">
                    <strong>Link to track:</strong>
                    <input type="text" name="track_link" class="form-control" placeholder="Link to track...">
                    <strong>Genre:</strong>
                    <select class="form-control" name="genre" required focus>
                        <option value="Rock"  selected>Rock</option>
                        <option value="Drum'n'Bass"  selected>Drum'n'Bass</option>
                        <option value="Vocaloid" selected>Vocaloid</option>
                        <option value="EDM" selected>EDM</option>
                    </select>

                </div>
                 <div class="mb-3">
                    <label class="form-label" for="inputImage">Select Image:</label>
                    <input
                        type="file"
                        name="image"
                        id="inputImage"
                        class="form-control @error('image') is-invalid @enderror">

                    <!-- @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror -->
                </div>


            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
