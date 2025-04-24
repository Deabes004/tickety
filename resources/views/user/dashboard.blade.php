@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

<style>
  body {
    background-color: #111 !important;
    color: #fff;
  }

  .dashboard-container {
    display: flex;
    margin-top: 80px; /* علشان الـ navbar */
    height: calc(100vh - 80px);
  }

  .left-side {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
    text-align: center;
  }

  .right-side {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
  }

  .cards-wrapper {
    display: flex;
    gap: 30px;
    justify-content: center;
    align-items: stretch;
    flex-wrap: wrap;
  }

  .cards-wrapper .card {
    flex: 1 1 45%;
    max-width: 350px;
    background-color: #222 !important;
    color: #fff;
    border-radius: 10px;
  }

  .card .card-title {
    color: #ffcc00;
  }

  .card .card-text {
    color: #ccc;
  }

  .btn-outline-primary,
  .btn-outline-danger {
    border-color: #ffcc00 !important;
    background-color: #ffcc00 !important;
    color: #111 !important;
  }

  .btn-outline-primary:hover,
  .btn-outline-danger:hover {
    background-color: black !important;
    color: #fff !important;
  }
</style>

<div class="dashboard-container">
  <!-- Left Side: Welcome Message -->
  <div class="left-side">
    <div>
      <h2 class="fw-bold">👋 Welcome, {{ $user->name ?? 'Guest' }}!</h2>
      <p class="text-muted fs-5">Here you can manage your bookings, view your tickets, and enjoy the show!</p>
    </div>
  </div>

  <!-- Right Side: Cards and Buttons -->
  <div class="right-side">
    <div class="cards-wrapper">
        <!-- My Bookings -->
        <div class="card shadow-sm border-0 h-100 text-center p-4">
            <i class="bi bi-ticket-perforated-fill fs-1 text-warning mb-3"></i>
            <h5 class="card-title fw-bold">My Bookings</h5>
            <p class="card-text">Check your current and past bookings.</p>
            <a href="{{ route('user.bookings.index') }}" class="btn btn-outline-primary rounded-pill mt-3">Go to Bookings</a>
        </div>

        <!-- Browse Movies -->
        <div class="card shadow-sm border-0 h-100 text-center p-4">
            <i class="bi bi-film fs-1 text-warning mb-3"></i>
            <h5 class="card-title fw-bold">Browse Movies</h5>
            <p class="card-text">Explore the latest movies and book your seat.</p>
            <a href="{{ route('user.movies.index') }}" class="btn btn-outline-danger rounded-pill mt-3">View Movies</a>
        </div>
    </div>
  </div>
</div>
@endsection
