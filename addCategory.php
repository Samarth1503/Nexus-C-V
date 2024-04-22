<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];

    // Database connection settings
    $dbHost = "localhost"; // Change to your MySQL host if different
    $dbUsername = "root"; // Change to your MySQL username
    $dbPassword = ""; // Change to your MySQL password
    $dbName = "coupon_store"; // Change to your database name

    // Create a database connection
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert data
    $sql = "INSERT INTO category (category_name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
