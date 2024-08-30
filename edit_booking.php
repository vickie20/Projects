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

    // Fetch the booking details
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update booking details
        $route = $_POST['route'];
        $vehicle = $_POST['vehicle'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $update_stmt = $conn->prepare("UPDATE bookings SET route = ?, vehicle = ?, date = ?, time = ? WHERE id = ?");
        $update_stmt->bind_param("ssssi", $route, $vehicle, $date, $time, $id);

        if ($update_stmt->execute()) {
            header("Location: manage_bookings.html"); // Redirect back to the manage bookings page
            exit();
        } else {
            echo "Error updating booking.";
        }

        $update_stmt->close();
    }

    $stmt->close();
} else {
    header("Location: manage_bookings.html");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="manage-styles.css">
</head>
<body>
    <header>
        <h1>Edit Booking</h1>
    </header>
    <main>
        <form action="" method="POST">
            <label for="route">Route:</label>
            <input type="text" id="route" name="route" value="<?php echo htmlspecialchars($booking['route']); ?>" required>

            <label for="vehicle">Vehicle:</label>
            <input type="text" id="vehicle" name="vehicle" value="<?php echo htmlspecialchars($booking['vehicle']); ?>" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($booking['date']); ?>" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="<?php echo htmlspecialchars($booking['time']); ?>" required>

            <button type="submit">Update Booking</button>
        </form>
    </main>
</body>
</html>
