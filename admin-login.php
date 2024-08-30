<?php
session_start();
include 'db_config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password_hash FROM employees WHERE employee_id = ?");
    $stmt->bind_param("s", $employee_id);
    $stmt->execute();
    $stmt->bind_result($password_hash);
    $stmt->fetch();

    if (password_verify($password, $password_hash)) {
        $_SESSION['employee_id'] = $employee_id;
        header("Location: dashboard.html"); // Redirect to management dashboard
        exit();
    } else {
        echo "Invalid login credentials.";
    }

    $stmt->close();
}

$conn->close();
?>
