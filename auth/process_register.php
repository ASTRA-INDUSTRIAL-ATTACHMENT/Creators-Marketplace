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
$confirm = $_POST['confirm-password'] ?? '';
$role = $_POST['role'] ?? '';

$errors = [];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email address';
}
if (strlen($password) < 6) {
    $errors[] = 'Password must be at least 6 characters';
}
if ($password !== $confirm) {
    $errors[] = 'Passwords do not match';
}
$allowedRoles = ['creator','business'];
if (!in_array($role, $allowedRoles, true)) {
    $errors[] = 'Invalid role selected';
}

if ($errors) {
    $_SESSION['flash_errors'] = $errors;
    header('Location: ./register.php');
    exit;
}

$name = strstr($email, '@', true) ?: 'User';
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insert user
$stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, password_hash, role) VALUES (?,?,?,?)");
if (!$stmt) {
    $_SESSION['flash_errors'] = ['Database error: failed to prepare statement'];
    header('Location: ./register.php');
    exit;
}
mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $hash, $role);
if (!mysqli_stmt_execute($stmt)) {
    // Use errno to detect duplicates reliably (1062)
    $code = mysqli_stmt_errno($stmt) ?: mysqli_errno($conn);
    if ($code === 1062) {
        $_SESSION['flash_errors'] = ['Email already in use'];
    } else {
        $_SESSION['flash_errors'] = ['Database error: ' . mysqli_stmt_error($stmt)];
    }
    header('Location: ./register.php');
    exit;
}
$user_id = mysqli_insert_id($conn);

// Auto-create profile rows where applicable
if ($role === 'creator') {
    @mysqli_query($conn, "INSERT INTO creator_profiles (user_id) VALUES (" . (int)$user_id . ")");
} elseif ($role === 'business') {
    @mysqli_query($conn, "INSERT INTO business_profiles (user_id) VALUES (" . (int)$user_id . ")");
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
