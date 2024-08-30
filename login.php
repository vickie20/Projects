<?php
session_start();
include 'db_config.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set secure session cookie parameters
session_set_cookie_params([
    'lifetime' => 86400, // 1 day
    'secure' => true, // Use HTTPS
    'httponly' => true, // Prevent JavaScript access
    'samesite' => 'Strict' // Prevent cross-site request forgery
]);

// Regenerate session ID to prevent session fixation attacks
session_regenerate_id(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $email = filter_var($_POST['loginEmail'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['loginPassword'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "<p style='color: red;'>Email and Password are required.</p>";
        exit;
    }

    // Prevent SQL injection
    $email = $conn->real_escape_string($email);

    // Prepare and execute the query
    if ($stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?")) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // User authenticated successfully
                $_SESSION['user_id'] = $user_id; // Set session variable with user ID
                $_SESSION['email'] = $email; // Store user email in session
                
                // Redirect to the dashboard
                header("Location: booking.html");
                exit();
            } else {
                // Invalid password
                echo "<p style='color: red;'>Invalid email or password.</p>";
            }
        } else {
            // Invalid email
            echo "<p style='color: red;'>Invalid email or password.</p>";
        }

        $stmt->close();
    } else {
        echo "<p style='color: red;'>Database error: Could not prepare statement.</p>";
    }

    $conn->close();
}
?>
