<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Tickety</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html, body {
      height: 100%;
      font-family: Arial, sans-serif;
      background-color: #111;
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

    header h1 { font-size: 28px; color: #ffcc00; }

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

    nav a:hover { color: #ffcc00; }

    .container {
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

    .login-form {
      width: 100%;
      max-width: 400px;
      background-color: #222;
      border-radius: 10px;
      padding: 30px;
    }

    .login-form h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #ffcc00;
    }

    .login-form label {
      display: block;
      margin-bottom: 8px;
      color: #ccc;
    }

    .login-form input {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: none;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      font-size: 16px;
    }

    .password-wrapper {
      position: relative;
      margin-bottom: 20px;
    }

    .password-wrapper input {
      padding-right: 70px;
    }

    .password-wrapper button {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #ffcc00;
      font-weight: bold;
      cursor: pointer;
    }

    .login-form button[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #ffcc00;
      color: #111;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-form button[type="submit"]:hover {
      background-color: black;
      color: #fff;
    }

    .signup-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .signup-link a {
      color: #ffcc00;
      text-decoration: none;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }

    footer {
      background-color: #222;
      text-align: center;
      padding: 10px;
      color: #777;
      font-size: 14px;
      position: relative;
      bottom: 0;
      width: 100%;
    }

    @media (max-width: 768px) {
      .container { flex-direction: column; }
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
</head>
<body>

  <header>
    <h1>Tickety</h1>
    <nav>
      <a href="/">Home</a>
      <a href="#">Now Showing</a>
      <a href="#">Coming Soon</a>
      <a href="#">Contact</a>
    </nav>
  </header>

  <div class="container">
    <div class="left-side">
      <div class="left-side-content">
        <h1>Welcome to <span style="color: #ffcc00;">Tickety</span></h1>
        <p>Your gateway to the best movie experience.<br/> Book your seats today!</p>
      </div>
    </div>

    <div class="right-side">
      <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf

        <h2>Login</h2>

        <!-- Email -->
        <label for="email">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          value="{{ old('email') }}"
          required
          placeholder="Enter your email"
        />
        @error('email') <div class="text-danger small">{{ $message }}</div> @enderror

        <!-- Password -->
        <label for="password">Password</label>
        <div class="password-wrapper">
          <input
            type="password"
            id="password"
            name="password"
            required
            placeholder="Enter your password"
          />
          <button type="button" onclick="toggleVisibility('password', this)">Show</button>
        </div>
        @error('password') <div class="text-danger small">{{ $message }}</div> @enderror

        <!-- Submit -->
        <button type="submit">Sign In</button>

        <!-- Sign up link -->
        <div class="signup-link">
          Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
        </div>
      </form>
    </div>
  </div>

  <footer>
    &copy; 2025 Tickety. All rights reserved.
  </footer>

  <script>
    function toggleVisibility(fieldId, btn) {
      const input = document.getElementById(fieldId);
      const isHidden = input.type === 'password';
      input.type = isHidden ? 'text' : 'password';
      btn.textContent = isHidden ? 'Hide' : 'Show';
    }
  </script>

</body>
</html>
