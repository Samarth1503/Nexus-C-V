<?php

// Database connection settings
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "coupon_store"; 

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to check if the provided credentials exist
$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// Check if a matching record was found
if ($result->num_rows == 1) {
    // Successful login, redirect to admin panel or another page
    header("Location: http://localhost/project-pushkar/AdminPanel.php");
    exit();
} else {
    // Invalid credentials, display an alert and redirect back to the login page
    echo '<script>alert("Invalid username or password. Please try again.");</script>';
    header("Location: admin_login.html");
    exit();
}

// Close the database connection
$conn->close();

?>