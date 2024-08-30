<?php
include 'db_config.php'; // Ensure this file sets up $conn

// Fetch bookings from the database
$sql = "SELECT id, route, vehicle_type, pickup_station, drop_station, travel_date, travel_time FROM bookings";
$result = $conn->query($sql);

// Check if query execution was successful
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Output the data in an HTML table
    echo '<table border="1" cellpadding="10">';
    echo '<thead><tr><th>ID</th><th>Route</th><th>Vehicle Type</th><th>Pickup Station</th><th>Drop Station</th><th>Travel Date</th><th>Travel Time</th><th>Actions</th></tr></thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['route']) . '</td>';
        echo '<td>' . htmlspecialchars($row['vehicle_type']) . '</td>';
        echo '<td>' . htmlspecialchars($row['pickup_station']) . '</td>';
        echo '<td>' . htmlspecialchars($row['drop_station']) . '</td>';
        echo '<td>' . htmlspecialchars($row['travel_date']) . '</td>';
        echo '<td>' . htmlspecialchars($row['travel_time']) . '</td>';
        echo '<td>
            <button onclick="editBooking(' . htmlspecialchars($row['id']) . ')">Edit</button>
            <button onclick="confirmDelete(' . htmlspecialchars($row['id']) . ')">Delete</button>
            </td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No bookings found.';
}

// Close the database connection
$conn->close();
?>
