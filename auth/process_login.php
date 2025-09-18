<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$errors = [];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email address';
}
if ($password === '') {
    $errors[] = 'Password is required';
}

if ($errors) {
    $_SESSION['flash_errors'] = $errors;
    header('Location: ./index.php');
    exit;
}

$stmt = mysqli_prepare($conn, 'SELECT id, password_hash, role FROM users WHERE email = ? LIMIT 1');
if (!$stmt) {
    $_SESSION['flash_errors'] = ['Database error'];
    header('Location: ./index.php');
    exit;
}
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $user_id, $password_hash, $role);
$found = mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if (!$found) {
    $_SESSION['flash_errors'] = ['Invalid credentials'];
    header('Location: ./index.php');
    exit;
}

// If user registered via Google (password_hash NULL), you would verify OAuth here.
if ($password_hash === null) {
    $_SESSION['flash_errors'] = ['This account requires Google Sign-In'];
    header('Location: ./index.php');
    exit;
}

if (!password_verify($password, $password_hash)) {
    $_SESSION['flash_errors'] = ['Invalid credentials'];
    header('Location: ./index.php');
    exit;
}

$_SESSION['user_id'] = $user_id;
$_SESSION['user_role'] = $role;
$_SESSION['user_email'] = $email;
session_regenerate_id(true);

// Redirect to dashboard by role (relative URLs are safest behind proxies)
if ($role === 'creator') {
    header('Location: ../dashboard/creator.php');
} elseif ($role === 'business') {
    header('Location: ../dashboard/business.php');
} else {
    header('Location: ../index.php');
}
exit;
