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
$img_src =$_POST['brand'.'.png'];
$expiry = $_POST['expiry'];
$price = $_POST['price'];
$supplier_ID = $_POST['supplier'];  
$cost_price = $_POST['cost_price'];
// $category = isset($_POST['category']) ? implode(', ', $_POST['category']) : '';
$category = isset($_POST['category']) ? (is_array($_POST['category']) ? implode(', ', $_POST['category']) : $_POST['category']) : '';


// Insert data into the database
$query = "INSERT INTO coupon (coupon_desc, brand, quantity, expiry, price, supplier_ID, category,image_src, cost_price)
          VALUES ('$coupon_desc', '$brand', '$quantity', '$expiry', '$price', '$supplier_ID', '$category','$img_src', '$cost_price')";


if (mysqli_query($con, $query)) {
    echo "Coupon added successfully.";
} else {
    echo "Error: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
