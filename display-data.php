<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <style type="text/css">
        table {
            border: 2px solid red;
            background-color: white;
            width: 100%;
            border-collapse: collapse;
        }
        th {
            border-bottom: 5px solid #000;
            padding: 10px;
        }
        td {
            border-bottom: 2px solid #666;
            padding: 10px;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Display Data from Database</h1>
    <?php
    include('connect-mysql.php'); // Ensure the correct path to your DB connection file

    // Check if connection was successful
    if (!$dbcon) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $sqlget = "SELECT * FROM bookings";
    $sqldata = mysqli_query($dbcon, $sqlget);

    if (!$sqldata) {
        die('Error executing query: ' . mysqli_error($dbcon));
    }

    // Display data in table format
    echo "<table>";
    echo "<tr><th>ID</th><th>Last Name</th><th>Route</th><th>Pickup Station</th><th>Drop Station</th><th>Travel Date</th><th>Travel Time</th></tr>";

    while ($row = mysqli_fetch_assoc($sqldata)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['route']) . "</td>";
        echo "<td>" . htmlspecialchars($row['pickup_station']) . "</td>";
        echo "<td>" . htmlspecialchars($row['drop_station']) . "</td>";
        echo "<td>" . htmlspecialchars($row['travel_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['travel_time']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Close the connection
    mysqli_close($dbcon);
    ?>
</body>
</html>
