<?php
include 'db_config.php'; // Ensure this file sets up $conn

// Query to get all reports
$sql = "SELECT report_date, report_data FROM reports ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h2>Previously Generated Reports</h2>';
    while ($row = $result->fetch_assoc()) {
        echo '<h3>Report Date: ' . htmlspecialchars($row['report_date']) . '</h3>';
        echo '<div>' . htmlspecialchars($row['report_data']) . '</div><br>';
    }
} else {
    echo 'No reports available.';
}

$conn->close();
?>
