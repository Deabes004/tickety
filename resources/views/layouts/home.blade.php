@extends('layouts.app')

@section('content')

<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  html, body {
    height: 100%;
    background-color: #111;
    font-family: Arial, sans-serif;
    color: #fff;
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #222;
    padding: 20px 40px;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
  }

  header h1 {
    font-size: 28px;
    color: #ffcc00;
  }

  nav {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
  }

  nav a {
    color: white;
    margin-left: 20px;
    text-decoration: none;
    font-weight: 500;
    text-transform: uppercase;
  }

  nav a:hover {
    color: #ffcc00;
  }

  .hero-section {
    display: flex;
    flex-direction: row;
    height: 100vh;
    margin-top: 30px;
  }

  .left-side {
    flex: 1;
    background: url('https://images.unsplash.com/photo-1524985069026-dd778a71c7b4') no-repeat center center/cover;
    position: relative;
  }

  .left-side::after {
    content: "";
    position: absolute;
    top: 0; left: 0; bottom: 0; right: 0;
    background: rgba(0, 0, 0, 0.5);
  }

  .left-side-content {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    text-align: center;
    z-index: 1;
  }

  .left-side-content h1 {
    font-size: 48px;
    margin-bottom: 20px;
  }

  .left-side-content p {
    font-size: 18px;
    line-height: 1.5;
  }

  .right-side {
    flex: 1;
    background-color: #111;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 120px 20px 40px;
  }

  .cta-box {
    background-color: #222;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.4);
    text-align: center;
    width: 100%;
    max-width: 400px;
    z-index: 1;
  }

  .cta-box h2 {
    color: #ffcc00;
    margin-bottom: 20px;
  }

  .cta-box p {
    color: #ccc;
    margin-bottom: 30px;
  }

  .cta-box a {
    display: inline-block;
    margin: 10px;
    padding: 12px 20px;
    background-color: #ffcc00;
    color: #111;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
  }

  .cta-box a:hover {
    background-color: black;
    color: white;
  }

  @media (max-width: 768px) {
    .hero-section { flex-direction: column; }
    .left-side, .right-side {
      flex: none;
      width: 100%;
      height: auto;
    }
    .left-side-content h1 {
      font-size: 32px;
    }
  }
</style>

<header>
  <h1>Tickety</h1>
  <nav>
    <a href="/">Home</a>
    <a href="#">Now Showing</a>
    <a href="#">Coming Soon</a>
    <a href="#">Contact</a>
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
  </nav>
</header>

<div class="hero-section">
  <div class="left-side">
    <div class="left-side-content">
      <h1>Welcome to <span style="color:#ffcc00">Tickety</span></h1>
      <p>Your one-stop solution for booking movie tickets.</p>
    </div>
  </div>
  <div class="right-side">
    <div class="cta-box">
      <h2>Start Exploring</h2>
      <p>Login or Register now to browse movies and book your seat instantly!</p>
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    </div>
  </div>
</div>

@endsection
