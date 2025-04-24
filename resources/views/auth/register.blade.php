<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - Tickety</title>
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

    .container {
  display: flex;
  height: 100vh;
}

    .left-side {
      width: 50%;
      background: url('https://images.unsplash.com/photo-1524985069026-dd778a71c7b4') no-repeat center center/cover;
      position: relative;
    }
    .left-side::after {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.5);
    }
    .left-side-content {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: 1;
    }
    .left-side-content h1 {
      font-size: 48px;
      margin-bottom: 20px;
    }
    .left-side-content p {
      font-size: 18px;
    }
    .right-side {
  width: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 120px 40px 40px; /* أعلى عشان يبعد عن الـ navbar */
  background-color: #111;
}
    .signup-form {
      width: 100%;
      max-width: 400px;
      background-color: #222;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }
    .signup-form h2 {
      text-align: center;
      color: #ffcc00;
      margin-bottom: 20px;
    }
    .signup-form label {
      display: block;
      margin-bottom: 8px;
      color: #ccc;
    }
    .signup-form input {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: none;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
    }
    .password-wrapper {
      position: relative;
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
    .signup-form button[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #ffcc00;
      border: none;
      border-radius: 5px;
      color: #111;
      font-size: 16px;
      cursor: pointer;
    }
    .signup-form button[type="submit"]:hover {
      background-color: black;
      color: #fff;
    }
    .login-link {
      text-align: center;
      margin-top: 15px;
    }
    .login-link a {
      color: #ffcc00;
      text-decoration: none;
    }
    .login-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
      .left-side, .right-side {
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

<!-- ✅ Navbar -->
<header>
  <h1>Tickety</h1>
  <nav>
    <a href="/">Home</a>
    <a href="#">Now Showing</a>
    <a href="#">Coming Soon</a>
    <a href="#">Contact</a>
    <a href="{{ route('login') }}">Login</a>
  </nav>
</header>

<!-- ✅ Main Content -->
<div class="container">
  <div class="left-side">
    <div class="left-side-content">
      <h1>Join <span style="color: #ffcc00;">Tickety</span></h1>
      <p>Sign up and never miss a movie again!<br/> Book your tickets instantly.</p>
    </div>
  </div>

  <div class="right-side">
    <form class="signup-form" method="POST" action="{{ route('register') }}">
      @csrf

      <h2>Sign Up</h2>

      <!-- Full Name -->
      <label for="name">Full Name</label>
      <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name') }}"
        required
        placeholder="Write your full name"
      />

      <!-- Email -->
      <label for="email">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        value="{{ old('email') }}"
        required
        placeholder="Enter your email address"
      />

      <!-- Password -->
      <label for="password">Password</label>
      <div class="password-wrapper">
        <input
          type="password"
          id="password"
          name="password"
          required
          placeholder="Choose a strong password"
        />
        <button type="button" onclick="toggleVisibility('password', this)">Show</button>
      </div>

      <!-- Confirm Password -->
      <label for="password_confirmation">Confirm Password</label>
      <div class="password-wrapper">
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          required
          placeholder="Re-enter your password"
        />
        <button type="button" onclick="toggleVisibility('password_confirmation', this)">Show</button>
      </div>

      <!-- Submit -->
      <button type="submit">Sign Up</button>

      <!-- Link to login -->
      <div class="login-link">
        Already have an account? <a href="{{ route('login') }}">Log In</a>
      </div>
    </form>
  </div>
</div>


<script>
  function toggleVisibility(fieldId, btn) {
    const field = document.getElementById(fieldId);
    const isHidden = field.type === 'password';
    field.type = isHidden ? 'text' : 'password';
    btn.textContent = isHidden ? 'Hide' : 'Show';
  }
</script>

</body>
</html>
