<?php
session_start();
$flash_errors = $_SESSION['flash_errors'] ?? [];
unset($_SESSION['flash_errors']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creator Marketplace - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom right, #111827, #000000);
      color: #ffffff;
      font-family: sans-serif;
    }
    .navbar {
      background: rgba(17, 24, 39, 0.8);
      backdrop-filter: blur(10px);
    }
    .navbar-brand {
      background: linear-gradient(to right, #22d3ee, #a855f7);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      font-weight: bold;
    }
    .nav-link {
      color: #d1d5db !important;
    }
    .nav-link:hover {
      color: #22d3ee !important;
    }
    .btn-signup {
      background:  #106572ff;
      color: #000000;
      border-radius: 50rem;
      font-weight: 600;
    }
    .btn-signup:hover {
      background: #06b6d4;
    }
    .gradient-text {
      background: linear-gradient(to right, #22d3ee, #a855f7);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0% { opacity: 1; }
      50% { opacity: 0.8; }
      100% { opacity: 1; }
    }
    .register-card {
      background: rgba(31, 41, 55, 0.5);
      border: 1px solid #22d3ee;
      border-radius: 0.75rem;
      transition: background 0.3s;
    }
    .register-card:hover {
      background: rgba(31, 41, 55, 0.7);
    }
    .btn-register {
      background: linear-gradient(to right, #22d3ee, #a855f7);
      color: #000000;
      border-radius: 50rem;
      font-weight: 600;
      transition: transform 0.3s;
    }
    .btn-register:hover {
      transform: scale(1.05);
    }
    .btn-google {
      background: #ffffff;
      color: #000000;
      border-radius: 50rem;
      font-weight: 600;
      transition: transform 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }
    .btn-google:hover {
      background: #e0e0e0;
      transform: scale(1.05);
    }
    .google-icon {
      width: 20px;
      height: 20px;
    }
    .form-control {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid #22d3ee;
      color: #ffffff;
    }
    .form-control:focus {
      background: rgba(255, 255, 255, 0.2);
      border-color: #06b6d4;
      color: #ffffff;
      box-shadow: none;
    }
    .form-select {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid #22d3ee;
      color: #ffffff;
    }
    .form-select:focus {
      background: rgba(255, 255, 255, 0.2);
      border-color: #06b6d4;
      color: #ffffff;
      box-shadow: none;
    }
    .form-label {
      color: #d1d5db;
    }
    .footer {
      background: rgba(17, 24, 39, 0.8);
    }
    .footer a {
      color: #d1d5db;
      text-decoration: none;
    }
    .footer a:hover {
      color: #22d3ee;
    }
    a {
      color: #22d3ee;
      text-decoration: none;
    }
    a:hover {
      color: #06b6d4;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand fs-4" href="#">Astra Creators</a>
      <button class="navbar-toggler bg-light opacity-80" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Campaigns</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.php">Login</a></li>
          <li class="nav-item">
            <a class="nav-link btn btn-signup px-4 py-2" href="./register.php">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="flex-grow-1 d-flex flex-column align-items-center justify-content-center p-3 mt-5">
    <!-- Register Section -->
    <section class="container mb-5" id="register">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="register-card p-4">
            <h2 class="fs-2 fw-bold text-center gradient-text mb-4">Sign Up</h2>
            <?php if (!empty($flash_errors)): ?>
              <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                  <?php foreach ($flash_errors as $e): ?>
                    <li><?php echo htmlspecialchars($e); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <form action="./process_register.php" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
              </div>
              <div class="mb-3">
                <label for="role" class="form-label">I am a</label>
                <select class="form-select bg-dark" id="role" name="role" required>
                  <option value="" disabled selected>Select your role</option>
                  <option value="creator">Creator</option>
                  <option value="business">Business</option>
                </select>
              </div>
              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-register py-2">Sign Up</button>
              </div>
              <div class="d-grid mb-3">
                <a href="#" class="btn btn-google py-2">
                  <img src="https://www.google.com/favicon.ico" alt="Google Icon" class="google-icon">
                  Continue with Google
                </a>
              </div>
              <p class="text-center">Already have an account? <a href="./index.php">Log In</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer py-5 mt-5">
    <div class="container text-center">
      <div class="d-flex justify-content-center gap-4 mb-3">
        <a href="#">Twitter</a>
        <a href="#">Instagram</a>
        <a href="#">LinkedIn</a>
        <a href="#">Contact Us</a>
      </div>
      <p class="text-secondary fs-6">&copy; 2025 Creator Marketplace. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>