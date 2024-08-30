<?php
session_start();
include 'db_config.php'; // Ensure this file contains the correct database connection details

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete booking from the database
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: manage_bookings.html"); // Redirect back to the manage bookings page
        exit();
    } else {
        echo "Error deleting booking.";
    }

    $stmt->close();
}

$conn->close();
?>
