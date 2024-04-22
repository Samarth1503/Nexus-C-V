<?php
// Establish a database connection (you should replace these values with your actual database credentials).
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coupon_store";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Get the selected option from the AJAX request.
$selectedOption = $_POST["option"];

// Initialize the result to an empty string.
$result = "";

if ($selectedOption === "CountBrands") {
    // Count the rows in the brand table.
    $stmt = $conn->prepare("SELECT COUNT(*) FROM brand");
    $stmt->execute();
    $count = $stmt->fetchColumn();
    $result = "Total number of brands: $count";
} elseif ($selectedOption === "CountCategories") {
    // Count the rows in the category table.
    $stmt = $conn->prepare("SELECT COUNT(*) FROM category");
    $stmt->execute();
    $count = $stmt->fetchColumn();
    $result = "Total number of categories: $count";
} elseif ($selectedOption === "CountCoupon") {
    // Count the rows in the coupon table.
    $stmt = $conn->prepare("SELECT COUNT(*) FROM coupon");
    $stmt->execute();
    $count = $stmt->fetchColumn();
    $result = "Total number of coupons: $count";
}

// Close the database connection.
$conn = null;

// Return the result to the JavaScript.
echo $result;
?>
