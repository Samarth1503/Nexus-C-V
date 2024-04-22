<?php
// Establish a database connection
$con = mysqli_connect('localhost', 'root', '', 'coupon_store');

if (!$con) {
    die('Error: Could not connect to the database.');
}

// Retrieve form data
$coupon_desc = $_POST['coupon_desc'];
$brand = $_POST['brand'];
$quantity = $_POST['quantity'];
$expiry = $_POST['expiry'];
$price = $_POST['price'];
$supplier_ID = $_POST['supplier_ID'];
$category = $_POST['category'];
$image_src = $_POST['images used/Logos/' . $brand . '.png'];

// Insert data into the database
$query = "INSERT INTO coupon (coupon_desc, brand, quantity, expiry, price, supplier_ID, category,image_src)
          VALUES ('$coupon_desc', '$brand', '$quantity', '$expiry', '$price', '$supplier_ID', '$category','$image_src')";

if (mysqli_query($con, $query)) {
    echo "Coupon added successfully.";
} else {
    echo "Error: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
