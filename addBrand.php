<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST["nameOfNewBrand"];
    $brandcontact = $_POST["numberOfNewBrand"];
    $brandEmail = $_POST["emailOfNewBrand"];

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

    // Prepare and execute the SQL query to insert data
    $sql = "INSERT INTO brand (brand, brand_contact, brand_email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $brand, $brandcontact, $brandEmail);

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