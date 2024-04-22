<?php
// Database connection settings
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "coupon_store";

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Construct the SQL query based on the table name (e.g., coupon)
$sql = "SELECT * FROM category";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    // Output table header
    echo "<tr>";
    while ($fieldInfo = $result->fetch_field()) {
        echo "<th>" . $fieldInfo->name . "</th>";
    }
    echo "</tr>";

    // Output data rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found in the coupon table.";
}

// Close the database connection
$conn->close();
?>
