<?php
session_start();
include 'db_config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT email, phone FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($email, $phone);
$stmt->fetch();

if ($email && $phone) {
    echo "Welcome to the Booking Dashboard, User Email: $email, Phone: $phone!";
} else {
    echo "User data could not be retrieved.";
}

$stmt->close();
$conn->close();
?>
