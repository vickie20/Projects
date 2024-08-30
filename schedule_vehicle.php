<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db_config.php';

// Debugging
echo "Session ID: " . session_id() . "<br>";
echo "User ID: " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'Not set') . "<br>";

// Check if form data is being received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    // Retrieve form data
    $vehicle_numberplate = $_POST['vehicle_numberplate'];
    $driver_name = $_POST['driver_name'];
    $route = $_POST['route'];
    $travel_date = $_POST['travel_date'];
    $travel_time = $_POST['travel_time'];

    // Prepare and execute SQL query to insert data
    $sql = "INSERT INTO vehicle_schedule (vehicle_numberplate, driver_name, route, travel_date, travel_time) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $vehicle_numberplate, $driver_name, $route, $travel_date, $travel_time);

    if ($stmt->execute()) {
        echo "Vehicle scheduled successfully.";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No POST data received.";
}
?>
