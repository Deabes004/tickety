@extends('layouts.app')

@section('content')
<style>
    .section-title {
        text-align: center;
        margin: 40px 0 20px;
        font-size: 32px;
        color: #ffcc00;
    }

    .movies-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        padding: 0 40px 40px;
    }

    .movie-card {
        background-color: #222;
        border-radius: 10px;
        overflow: hidden;
        color: inherit;
        display: block;
        transition: transform 0.3s;
        cursor: pointer;
        text-decoration: none;
    }

    .movie-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 20px rgba(255, 204, 0, 0.3);
    }

    .movie-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .movie-card h3 {
        margin: 10px;
    }

    .movie-card p {
        margin: 0 10px 10px;
        font-size: 14px;
        color: #aaa;
        display: flex;
        justify-content: space-between;
    }

    .card-actions {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin: 10px;
    }

    @media (max-width: 768px) {
        .movies-container {
            grid-template-columns: repeat(2, 1fr);
            padding: 0 20px 20px;
        }
    }

    @media (max-width: 480px) {
        .movies-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-title">All Movies</h2>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">+ Add New Movie</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($movies->isEmpty())
        <div class="alert alert-info">No movies found.</div>
    @else
        <div class="movies-container">
            @foreach($movies as $movie)
                <div class="movie-card">
                    <img src="{{ $movie->poster_url ?? 'https://via.placeholder.com/300x450?text=No+Poster' }}" alt="{{ $movie->title }}">
                    <h3>{{ $movie->title }}</h3>
                    <p>{{ $movie->genre ?? 'N/A' }} | {{ $movie->duration_minutes }} min</p>
                    <p style="color: #ffcc00;">⭐ {{ $movie->rating ?? 'N/A' }}/10</p>
                    <div class="card-actions">
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
