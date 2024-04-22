<?php
// Start the session
session_start();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Check if the user is logged in (i.e., if $_SESSION["user_id"] is set)
    if (isset($_SESSION["user_id"])) {
        $userId = $_SESSION["user_id"];

        // Connect to your database (modify with your database details)
        $con = mysqli_connect('localhost', 'root', '', 'coupon_store');

        if (!$con) {
            die('Error: Could not connect to the database.');
        }

        // Retrieve the cart_id from the cart table based on Cust_id
        $query = "SELECT cart_id FROM cart WHERE Cust_id = $userId";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $cartId = $row['cart_id'];

            // Check if the product already exists in cart_master
            $checkQuery = "SELECT * FROM cart_master WHERE cart_id = $cartId AND Coupon_id = $productId";
            $checkResult = mysqli_query($con, $checkQuery);

            if ($checkResult && mysqli_num_rows($checkResult) > 0) {
                echo 'Product already in cart';
            } else {
                // Insert values into the cart_master table
                $insertQuery = "INSERT INTO cart_master (cart_id, Coupon_id) VALUES ($cartId, $productId)";
                $insertResult = mysqli_query($con, $insertQuery);

                if ($insertResult) {
                    echo 'Product added to cart.';
                } else {
                    echo '<script>alert("Error inserting into cart_master: ' . mysqli_error($con) . '");</script>';
                }
            }
        } else {
            echo '<script>alert("Cart not found for the user.");</script>';
        }

        // Close the database connection
        mysqli_close($con);
    } else {
        echo '<script>alert("User is not logged in.");</script>';
    }
}
?>