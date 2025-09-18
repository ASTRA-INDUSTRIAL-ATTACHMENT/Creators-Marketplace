<?php
// Ensure mysqli does NOT throw exceptions so we can handle errors via return codes
if (function_exists('mysqli_report')) {
    mysqli_report(MYSQLI_REPORT_OFF);
}
// Database connection for XAMPP
// Default phpMyAdmin credentials: user 'root', empty password
// Database name inferred from phpMyAdmin URL: 'data'

$DB_HOST = getenv('DB_HOST') ?: '127.0.0.1';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') ?: '';
$DB_NAME = getenv('DB_NAME') ?: 'data';
$DB_PORT = (int) (getenv('DB_PORT') ?: 3306);

$conn = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

if (!$conn) {
    http_response_code(500);
    die('Database connection failed: ' . htmlspecialchars(mysqli_connect_error()));
}

// Set proper charset
if (!mysqli_set_charset($conn, 'utf8mb4')) {
    // Not a fatal error for the app, but log/display for now
    error_log('Failed to set MySQL charset to utf8mb4: ' . mysqli_error($conn));
}

// Small helper to safely escape values if needed in legacy queries
function db_escape($value)
{
    global $conn;
    return mysqli_real_escape_string($conn, $value);
}

// Optional health check endpoint (include this file and visit ?ping=db)
if (isset($_GET['ping']) && $_GET['ping'] === 'db') {
    header('Content-Type: application/json');
    echo json_encode(['ok' => mysqli_ping($conn)]);
    exit;
}
?>
