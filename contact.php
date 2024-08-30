<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css"> <!-- Link to your CSS file -->
    <style>
        .contact-us { margin-top: 20px; }
        .contact-us form input, .contact-us form textarea { display: block; margin-bottom: 10px; }
        .contact-us .feedback { margin-top: 20px; }
        .feedback .comment { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <!-- Navigation Menu -->
    <nav class="navigation">
        <ul>
            <li><a href="booking.html">Booking Dashboard</a></li>
            <li><a href="contact.php">Feedback</a></li>
            <li><a href="#" id="logout">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Customer Feedback</h1>
        <form id="contact-form" action="contact_process.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <label for="rating">Rate Your Experience:</label>
            <select id="rating" name="rating">
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Good</option>
                <option value="3">3 - Average</option>
                <option value="2">2 - Poor</option>
                <option value="1">1 - Very Poor</option>
            </select>

            <button type="submit">Send</button>
        </form>

        <!-- Display Comments -->
        <div class="feedback">
            <h3>Comments and Feedback</h3>
            <?php
            
            include 'db_config.php';
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, message, rating, created_at FROM feedback ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='comment'>";
                    echo "<h4>" . htmlspecialchars($row['name']) . " - Rating: " . htmlspecialchars($row['rating']) . "</h4>";
                    echo "<p>" . htmlspecialchars($row['message']) . "</p>";
                    echo "<p><em>Posted on: " . htmlspecialchars($row['created_at']) . "</em></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No comments yet.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="contact.js"></script>
</body>
</html>
