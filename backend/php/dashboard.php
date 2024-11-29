<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../frontend/html/login.html");
    exit;
}

$html_file_path = "../../frontend/html/dashboard.html";

if (file_exists($html_file_path)) {
    readfile($html_file_path);
} else {
    die("Error: File not found at $html_file_path");
}
?>
