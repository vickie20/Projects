<?php
session_start();
include 'db_config.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $route = isset($_POST['route']) ? $conn->real_escape_string($_POST['route']) : '';
    $pickup = isset($_POST['pickup']) ? $conn->real_escape_string($_POST['pickup']) : '';
    $drop = isset($_POST['drop']) ? $conn->real_escape_string($_POST['drop']) : '';
    $travel_date = isset($_POST['travel_date']) ? $conn->real_escape_string($_POST['travel_date']) : '';
    $travel_time = isset($_POST['travel_time']) ? $conn->real_escape_string($_POST['travel_time']) : '';
    $vehicle = isset($_POST['vehicle']) ? $conn->real_escape_string($_POST['vehicle']) : '';
    $selected_seats = isset($_POST['selectedSeats']) ? $conn->real_escape_string($_POST['selectedSeats']) : '';

    // Debugging: Output form data to check
    echo "Route: $route <br>";
    echo "Pickup: $pickup <br>";
    echo "Drop: $drop <br>";
    echo "Travel Date: $travel_date <br>";
    echo "Travel Time: $travel_time <br>";
    echo "Vehicle: $vehicle <br>";
    echo "Selected Seats: $selected_seats <br>";

    // Check if all required fields are filled
    if (empty($route) || empty($pickup) || empty($drop) || empty($travel_date) || empty($travel_time) || empty($vehicle) || empty($selected_seats)) {
        die("Please fill all the required fields.");
    }

    // Insert booking details into the database
    $sql = "INSERT INTO bookings (route, pickup, drop_station, travel_date, travel_time, vehicle, seats) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssss", $route, $pickup, $drop, $travel_date, $travel_time, $vehicle, $selected_seats);

    if ($stmt->execute()) {
        // Booking successful
        echo "Booking submitted successfully.";

        // Optionally, redirect to a confirmation page
        // header("Location: booking_confirmation.php");

    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request method.");
}
?>
