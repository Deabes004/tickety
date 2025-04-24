@extends('layouts.app')

@section('content')
@php
    $user = Auth::user();
@endphp

<style>
  body {
    background-color: #111 !important;
    color: #fff;
  }

  .dashboard-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 80px;
    padding: 40px 20px;
    min-height: calc(100vh - 80px);
    text-align: center;
  }

  .dashboard-header {
    margin-bottom: 40px;
  }

  .dashboard-header h2 {
    font-size: 36px;
    color: #ffcc00;
  }

  .dashboard-header p {
    color: #ccc;
    font-size: 18px;
    max-width: 600px;
    margin: 0 auto;
  }

  .cards-wrapper {
    display: flex;
    gap: 30px;
    justify-content: center;
    align-items: stretch;
    flex-wrap: wrap;
  }

  .cards-wrapper .card {
    flex: 1 1 300px;
    max-width: 350px;
    background-color: #222;
    color: #fff;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(0,0,0,0.3);
    padding: 30px;
    transition: transform 0.3s ease;
  }

  .cards-wrapper .card:hover {
    transform: translateY(-5px);
  }

  .card i {
    font-size: 48px;
    color: #ffcc00;
    margin-bottom: 20px;
  }

  .card-title {
    font-size: 22px;
    color: #ffcc00;
    margin-bottom: 10px;
  }

  .card-text {
    color: #ccc;
    font-size: 16px;
  }

  .btn-outline-primary,
  .btn-outline-danger {
    border-color: #ffcc00 !important;
    background-color: #ffcc00 !important;
    color: #111 !important;
    margin-top: 15px;
    font-weight: bold;
  }

  .btn-outline-primary:hover,
  .btn-outline-danger:hover {
    background-color: black !important;
    color: #fff !important;
  }
</style>

<div class="dashboard-container">
  <div class="dashboard-header">
    <h2>👋 Welcome, {{ $user->name ?? 'Guest' }}!</h2>
    <p>Here you can manage everything related to your movie-going experience – check bookings, explore movies, and more.</p>
  </div>

  <div class="cards-wrapper">
    <!-- My Bookings -->
    <div class="card text-center">
      <i class="bi bi-ticket-perforated-fill"></i>
      <h5 class="card-title">My Bookings</h5>
      <p class="card-text">Check your current and past bookings.</p>
      <a href="{{ route('user.bookings.index') }}" class="btn btn-outline-primary rounded-pill">View Bookings</a>
    </div>

    <!-- Browse Movies -->
    <div class="card text-center">
      <i class="bi bi-film"></i>
      <h5 class="card-title">Browse Movies</h5>
      <p class="card-text">Explore the latest releases and book your favorite seats.</p>
      <a href="{{ route('user.movies.index') }}" class="btn btn-outline-danger rounded-pill">View Movies</a>
    </div>

    <!-- Profile Settings -->
    <div class="card text-center">
      <i class="bi bi-person-circle"></i>
      <h5 class="card-title">Profile Settings</h5>
      <p class="card-text">Update your personal info, password, and preferences.</p>
      <a href="{{ route('user.profile') }}" class="btn btn-outline-primary rounded-pill">Edit Profile</a>
    </div>
</div>
@endsection
