<!-- resources/views/videos/index.blade.php -->

@extends('layouts')

@section('title', 'All Videos')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">All Videos</h2>

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

    @if(count($videos) > 0)
        <div class="row">
            @foreach($videos as $video)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->movie_title }}</h5>
                            <video width="100%" controls>
                                <source src="{{ asset('assets/images/videos/' . pathinfo($video->movie_file)['basename']) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <form action="{{ route('add_wislist', $video->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning mt-2">Add to Wishlist</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No videos available.</p>
    @endif
</div>
@endsection
