<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost"; // Change to your server name if necessary
    $username = "root"; // Change to your database username if necessary
    $password = ""; // Change to your database password if necessary
    $dbname = "coupon_store"; // Change to your database name if necessary

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and retrieve form data
    $brand = $conn->real_escape_string($_POST["brandOfNewProduct"]);
    $category = $conn->real_escape_string($_POST["categoryOfNewProduct"]);
    $price = (float)$_POST["priceOfNewProduct"];
    $description = $conn->real_escape_string($_POST["descriptionOfNewProduct"]);
    $expiry = $_POST["expiryOfNewProduct"];
    $supplier = $conn->real_escape_string($_POST["supplierOfNewProduct"]);

    // Construct the DELETE SQL query with all conditions
    $sql = "DELETE FROM coupon WHERE brand = '$brand' AND category = '$category' AND price = '$price' AND coupon_desc = '$description' AND expiry = '$expiry' AND supplier_ID = '$supplier'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>