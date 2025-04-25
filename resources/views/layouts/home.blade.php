@extends('layouts.app')

@section('content')
<!-- Home Page Content -->

<!-- For all users (logged in or guests) -->
<section class="hero w-100">
    <div class="w-100 h-auto px-0 py-16 text-center bg-black pb-40 rounded-b-3xl">
        <h1 class="fw-bold text-7xl pb-5">Welcome to <span>Tickty</span></h1>
        <p class="pb-3 text-3xl">Your one-stop solution for booking and managing movie tickets.</p>
        <p class="pb-5 text-xl">Explore movies, choose your seats, and complete your payment in just a few clicks.</p>
        <div class="cta-buttons flex px-40 gap-5">
            <a href="{{ route('login') }}" class="btn bg-yellow-400 text-black font-bold py-3 px-4 rounded w-full">Login</a>
            <a href="{{ route('register') }}" class="btn bg-yellow-400 text-black font-bold py-3 px-4 rounded w-full">Register</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features py-5">
    <div class="container-fluid text-center">
        <h2 class="fw-bold text-5xl pb-5">What We Do</h2>
        <div class="services flex justify-center gap-8">
            <div class="card bg-gray-800 text-white p-6 rounded-lg w-80">
                <h1 class="text-2xl font-bold pb-4">Browse Movies</h1>
                <p>Choose from a wide variety of movies and showtimes, including all the latest releases!</p>
            </div>
            <div class="card bg-gray-800 text-white p-6 rounded-lg w-80">
                <h1 class="text-2xl font-bold pb-4">Choose Your Seat</h1>
                <p>Select the perfect seat from our interactive seat map and enjoy your movie in comfort.</p>
            </div>
            <div class="card bg-gray-800 text-white p-6 rounded-lg w-80">
                <h1 class="text-2xl font-bold pb-4">Easy Payment</h1>
                <p>With a range of payment methods, booking your tickets is just a few clicks away.</p>
            </div>
        </div>
    </div>
</section>

@endsection
