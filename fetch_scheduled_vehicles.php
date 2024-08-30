<?php
session_start();
include 'db_config.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: "); // Redirect to login if not logged in
    exit();

}
// Fetch scheduled vehicles from the database
$sql = "SELECT * FROM vehicle_schedule ORDER BY travel_date, travel_time";
$result = $conn->query($sql);

// Check for query errors and display the results
if ($result === false) {
    echo "<p>Error: " . $conn->error . "</p>";
} else {
    if ($result->num_rows > 0) {
        // Output table
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Vehicle Numberplate</th>';
        echo '<th>Driver Name</th>';
        echo '<th>Route</th>';
        echo '<th>Travel Date</th>';
        echo '<th>Travel Time</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['vehicle_numberplate']) . '</td>';
            echo '<td>' . htmlspecialchars($row['driver_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['route']) . '</td>';
            echo '<td>' . htmlspecialchars($row['travel_date']) . '</td>';
            echo '<td>' . htmlspecialchars($row['travel_time']) . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No vehicles scheduled.</p>';
    }
}

$conn->close();
?>
