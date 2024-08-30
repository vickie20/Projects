<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, redirect to the dashboard
    header("Location: booking_dashboard.php");
    exit();
} else {
    // User is not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}
?>
