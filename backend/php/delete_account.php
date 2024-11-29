<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../frontend/html/connexion.html");
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'eu4_parodie');

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    session_unset();
    session_destroy();
    header("Location: ../../frontend/html/login.html?message=account_deleted");
    exit;
} else {
    die("Erreur lors de la suppression du compte : " . $stmt->error);
}

$stmt->close();
$conn->close();
?>
