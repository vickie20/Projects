<?php
session_start();
include 'db_config.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the user is logged in (adjust this based on your authentication system)
if (!isset($_SESSION['user_id'])) {
    die("You need to be logged in to make a payment.");
}

// Check if booking_id and amountDue are set in session
if (!isset($_SESSION['booking_id'])) {
    die("Required booking information is missing. Please try again.");
}

// Retrieve and sanitize form data
$mpesa_number = isset($_POST['mpesa_number']) ? $conn->real_escape_string($_POST['mpesa_number']) : '';
$payer_name = isset($_POST['payer_name']) ? $conn->real_escape_string($_POST['payer_name']) : '';
$booking_id = $_SESSION['booking_id']; 

// Debugging: Check if session variables are set
if (!isset($_SESSION['selected_seats']) || !isset($_SESSION['vehicle_type'])) {
    die("Seat selection or vehicle type information is missing. Please try again.");
}

// Debugging output to check session data
var_dump($_SESSION['selected_seats']);
var_dump($_SESSION['vehicle_type']);

// Retrieve selected seats and vehicle type from session
$selected_seats = $_SESSION['selected_seats']; // Example of storing selected seats in session
$vehicle_type = $_SESSION['vehicle_type']; // Example of storing vehicle type in session

// Ensure selected seats are in the correct format
if (!is_array($selected_seats) || empty($selected_seats)) {
    die("Selected seats data is invalid. Please select your seats again.");
}

// Calculate total amount based on selected seats and vehicle type
$seat_price = ($vehicle_type == '11-seater') ? 500 : 450; // Set price per seat based on vehicle type
$total_amount = count($selected_seats) * $seat_price; // Calculate total amount

// Debugging output to check total amount calculation
echo "Total seats selected: " . count($selected_seats) . "<br>";
echo "Seat price: " . $seat_price . "<br>";
echo "Total amount: " . $total_amount . "<br>";

// Check if the required form fields are filled
if (empty($mpesa_number) || empty($payer_name)) {
    die("Please fill all the required fields.");
}

// Insert payment details into the database
$sql = "INSERT INTO payments (booking_id, mpesa_number, payer_name, total_amount) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssd", $booking_id, $mpesa_number, $payer_name, $total_amount);

if ($stmt->execute()) {
    // Optionally update booking status to 'Paid' or similar if needed
    // Example: $conn->query("UPDATE bookings SET status='Paid' WHERE booking_id='$booking_id'");

    // Generate ticket or provide payment success message
    echo "Payment submitted successfully. Your ticket details will be processed.";

    // You can redirect or display ticket details here if needed
    // header("Location: ticket.php?booking_id=" . $booking_id); // Example redirect

} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
