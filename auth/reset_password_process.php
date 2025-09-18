<?php
session_start();
$email = trim($_POST['email'] ?? '');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['flash_errors'] = ['Please enter a valid email address.'];
    header('Location: ./reset_password.php');
    exit;
}
// Placeholder: In production, generate a token, store it, and email a reset link.
$_SESSION['flash_success'] = 'If an account exists for ' . htmlspecialchars($email) . ', a password reset link has been sent.';
header('Location: ./index.php');
exit;
