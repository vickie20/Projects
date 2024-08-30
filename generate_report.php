<?php
include 'db_config.php'; // Ensure this file sets up $conn

// Check if report_date is set
if (isset($_POST['report_date'])) {
    $reportDate = $_POST['report_date'];
    
    // Query to get bookings for the specified date
    $sql = "
        SELECT id AS booking_id, route, vehicle_type, pickup_station, drop_station, travel_date, travel_time
        FROM bookings
        WHERE travel_date = ?
    ";

    $stmt = $conn->prepare($sql);

    // Check if prepare() was successful
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param('s', $reportDate);
    $stmt->execute();
    $result = $stmt->get_result();

    // Format report data
    $reportData = '';
    while ($row = $result->fetch_assoc()) {
        $reportData .= 'Booking ID: ' . $row['booking_id'] . ', Route: ' . $row['route'] . ', Vehicle Type: ' . $row['vehicle_type'] . '<br>';
    }

    // Save report to the database
    $insertSql = "INSERT INTO reports (report_date, report_data) VALUES (?, ?)";
    $insertStmt = $conn->prepare($insertSql);

    // Check if prepare() was successful
    if ($insertStmt === false) {
        die("Error preparing insert statement: " . $conn->error);
    }

    $insertStmt->bind_param('ss', $reportDate, $reportData);
    $insertStmt->execute();

    // Display report details
    echo '<h2>Report for ' . htmlspecialchars($reportDate) . '</h2>';
    echo '<div>' . $reportData . '</div>';

    // Close connections
    $stmt->close();
    $insertStmt->close();
    $conn->close();
} else {
    echo 'Please select a date.';
}
?>
