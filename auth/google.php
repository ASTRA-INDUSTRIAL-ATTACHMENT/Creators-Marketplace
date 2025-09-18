<?php
session_start();
// Placeholder for Google OAuth flow
// In production, integrate Google OAuth (e.g., via Google API PHP client) and handle callbacks.
$_SESSION['flash_errors'] = ['Google Sign-In is not configured yet.'];
header('Location: ./index.php');
exit;
