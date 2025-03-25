@extends('layouts')  

@section('title', 'Add Video')  

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Add New Video</h2>

    @if(session('successmessage'))
        <div class="alert alert-success">
            {{ session('successmessage') }}
        </div>
    @endif

    @if(session('errormessage'))
        <div class="alert alert-danger">
            {{ session('errormessage') }}
        </div>
    @endif

    <form method="POST" action="{{route('store_videos') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="movie_title" class="form-label">Movie Title</label>
            <input type="text" class="form-control @error('movie_title') is-invalid @enderror" id="movie_title" name="movie_title" value="{{ old('movie_title') }}" required>
            @error('movie_title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="movie_file" class="form-label">Movie File (MP4, AVI, MKV)</label>
            <input type="file" class="form-control @error('movie_file') is-invalid @enderror" id="movie_file" name="movie_file" accept="video/*" required>
            @error('movie_file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Video</button>
    </form>
</div>
@endsection
