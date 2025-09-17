<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creator Marketplace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
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
      background: linear-gradient(to right, #ffffffff, #ffffffff);
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
      background: #106572ff;
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
    .card {
      background: rgba(31, 41, 55, 0.5);
      border-radius: 0.75rem;
      transition: background 0.3s;
    }
    .card:hover {
      background: rgba(31, 41, 55, 0.7);
    }
    .card-creator {
      border: 1px solid #22d3ee;
    }
    .card-business {
      border: 1px solid #a855f7;
    }
    .card-earn {
      border: 1px solid #22c55e;
    }
    .btn-creator {
      background: #22d3ee;
      color: #000000;
      border-radius: 50rem;
    }
    .btn-creator:hover {
      background: #06b6d4;
    }
    .btn-business {
      background: #a855f7;
      color: #000000;
      border-radius: 50rem;
    }
    .btn-business:hover {
      background: #9333ea;
    }
    .btn-earn {
      background: #22c55e;
      color: #000000;
      border-radius: 50rem;
    }
    .btn-earn:hover {
      background: #16a34a;
    }
    .btn-cta {
      background: linear-gradient(to right, #22d3ee, #a855f7);
      color: #000000;
      border-radius: 50rem;
      font-weight: 600;
      transition: transform 0.3s;
    }
    .btn-cta:hover {
      transform: scale(1.05);
    }


    .hero {
      position: relative;
      z-index: 1;
    }
    .hero:after{
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.6);
      z-index: 0;
    }
    .hero > * {
      position: relative;
      z-index: 1;
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
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Campaigns</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
          <li class="nav-item">
            <a class="nav-link btn btn-signup px-4 py-2" href="#">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="flex-grow-1 d-flex flex-column align-items-center justify-content-center p-3 mt-5">
    <!-- Hero Section -->
    <header class="text-center mb-5 pt-5 d-flex align-items-center justify-content-center flex-column container-fluid hero " style="height:70vh; width: 100%; background: url('./assets/img/content2.jpg') no-repeat center center; background-size: cover; ">
      <h1 class="display-3 fw-bold text-light">Creator Marketplace</h1>
      <p class="fs-3 text-light opacity-100 mt-3" style="font-family: 'Caveat', cursive;">
        Turn Your Influence into Income
      </p>
    </header>

    <!-- Cards -->
    <div class="container mb-5">
      <div class="row g-4">
        <!-- Card 1: Creators -->
        <div class="col-md-4">
          <div class="card card-creator p-4 h-100">
            <h2 class="fs-3 fw-semibold text-info">For Creators</h2>
            <p class="text-secondary mt-2">
              Showcase your vibe, apply to campaigns, and earn money from your passion.
            </p>
            <a href="#" class="btn btn-creator mt-3">Join as Creator</a>
          </div>
        </div>

        <!-- Card 2: Businesses -->
        <div class="col-md-4">
          <div class="card card-business p-4 h-100">
            <h2 class="fs-3 fw-semibold text-primary">For Businesses</h2>
            <p class="text-secondary mt-2">
              Launch ad campaigns and connect with micro-influencers to boost your brand.
            </p>
            <a href="#" class="btn btn-business mt-3">Post a Campaign</a>
          </div>
        </div>

        <!-- Card 3: Earnings -->
        <div class="col-md-4">
          <div class="card card-earn p-4 h-100">
            <h2 class="fs-3 fw-semibold text-success">Earn Online</h2>
            <p class="text-secondary mt-2">
              Secure payments with escrow, transparent earnings, and fast payouts.
            </p>
            <a href="#" class="btn btn-earn mt-3">Learn More</a>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <section class="text-center mb-5">
      <p class="fs-5 text-secondary mb-3">Ready to monetize your influence or grow your brand?</p>
      <a href="#" class="btn btn-cta px-5 py-3">Get Started Now</a>
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