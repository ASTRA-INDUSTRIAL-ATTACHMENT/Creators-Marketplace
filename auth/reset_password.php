<?php
session_start();
$flash_errors = $_SESSION['flash_errors'] ?? [];
unset($_SESSION['flash_errors']);
$flash_success = $_SESSION['flash_success'] ?? null;
unset($_SESSION['flash_success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
  <div class="container py-5" style="max-width:480px;">
    <h1 class="mb-4">Reset Password</h1>
    <?php if (!empty($flash_success)): ?>
      <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($flash_success); ?></div>
    <?php endif; ?>
    <?php if (!empty($flash_errors)): ?>
      <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
          <?php foreach ($flash_errors as $e): ?>
            <li><?php echo htmlspecialchars($e); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="./reset_password_process.php" method="POST" class="card p-4 bg-secondary">
      <div class="mb-3">
        <label for="email" class="form-label">Enter your account email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
      </div>
      <button type="submit" class="btn btn-primary">Send Reset Link</button>
      <a href="./index.php" class="btn btn-outline-light ms-2">Back to Login</a>
    </form>
  </div>
</body>
</html>
