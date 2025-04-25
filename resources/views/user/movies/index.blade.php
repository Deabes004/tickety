@extends('layouts.app')

@section('content')
<div class="px-0 w-screen">
<style>
    @keyframes scrollLeft {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }

    .scroll-slider {
        overflow: hidden;
        position: relative;
        width: 100%;
        height: 500px; /* Set the height to 500px */
    }

    .scroll-track {
        display: flex;
        width: calc(400px * 8);
        animation: scrollLeft 30s linear infinite;
    }

    .scroll-track img {
        width: 100%;
        height: 100%; /* Make the images take the full height of the slider */
        object-fit: cover;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
</style>

<div class="slider w-full px-0">
    <div class="scroll-slider">
        <div class="scroll-track">
            @for ($i = 0; $i < 10; $i++)
                <img src="{{ asset('Image/Mine.jpg') }}" alt="Image 1">
                <img src="{{ asset('Image/mufasa.jpg') }}" alt="Image 2">
                <img src="{{ asset('Image/sikoo.jpg') }}" alt="Image 3">
                <img src="{{ asset('Image/workk.jpg') }}" alt="Image 4">
            @endfor
        </div>
    </div>
</div>
    <div class="card shadow-sm border-0">
        <div class="my-10 text-center text-white text-3xl">
            <h1 class="fw-bold">🎬 Now Showing</h1>
        </div>
        <div class="card-body">
            @if($movies->isEmpty())
                <div class="alert alert-info">No movies available at the moment.</div>
            @else
                <div class="row">
                    @foreach($movies as $movie)
                       <div class="col-md-6 col-lg-4 mb-4 movie">
                            <div class="card h-100 shadow-sm border-0 position-relative">
                                <a href="{{ route('user.movies.show', $movie->id) }}" class="stretched-link text-decoration-none text-dark"></a>
                                @if($movie->poster_url)
                                    <img src="{{ $movie->poster_url }}" class="card-img-top" style="height: 350px; object-fit: cover;" alt="{{ $movie->title }} Poster">
                                @endif
                                <div class="card-body movie-info">
                                    <h5 class="card-title fw-bold">{{ $movie->title }}</h5>
                                    <p class="text-muted mb-1"><strong>Genre:</strong> {{ $movie->genre ?? 'N/A' }}</p>
                                    <p class="text-muted mb-1"><strong>Duration:</strong> {{ $movie->duration_minutes }} mins</p>
                                    <p class="text-muted mb-2"><strong>Rating:</strong> ⭐ {{ $movie->rating }}/5</p>
                                    <p class="small">{{ Str::limit($movie->description, 100) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
