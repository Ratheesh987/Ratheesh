@extends('layouts')

@section('title', 'Dashboard')

@section('header')
    <!-- Optional: You can add header content here -->
@endsection

@section('content')
    <div class="container-fluid page-wrapper dashboard-section">
        <div class="row">
            <div class="mb-4">
                <h3 class="page-top-heading">Dashboard</h3>
            </div>
        </div>

        <div class="row">
            <!-- Loop through the wishlist items and display movie details -->
            @foreach($wishlist as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Embed the video player -->
                        <video width="100%" controls>
                            <source src="{{ asset('assets/images/videos/' . pathinfo($movie->movie_file)['basename']) }}" type="video/mp4">

                            Your browser does not support the video tag.
                        </video>
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->movie_title }}</h5>
                            
                            <!-- Add any other movie attributes you want to display -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
    <!-- Optional: You can add footer content here -->
@endsection
