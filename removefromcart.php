<?php
// Start the session
session_start();

if (isset($_SESSION["user_id"]) && isset($_GET['id'])) {
    $userId = $_SESSION["user_id"];
    $productId = $_GET['id'];

    // Connect to your database (modify with your database details)
    $con = mysqli_connect('localhost', 'root', '', 'coupon_store');

    if (!$con) {
        die('Error: Could not connect to the database.');
    }

    // Retrieve the cart_id from the cart table based on Cust_id
    $cartIdQuery = "SELECT cart_id FROM cart WHERE Cust_id = $userId";
    $cartIdResult = mysqli_query($con, $cartIdQuery);

    if ($cartIdResult && mysqli_num_rows($cartIdResult) > 0) {
        $row = mysqli_fetch_assoc($cartIdResult);
        $cartId = $row['cart_id'];

        // Remove the row from cart_master where cart_id and coupon_id match
        $removeQuery = "DELETE FROM cart_master WHERE cart_id = $cartId AND Coupon_id = $productId";
        $removeResult = mysqli_query($con, $removeQuery);

        if ($removeResult) {
            // Redirect to the previous page or reload the current page
            
            header("Location:fullcart.php");
            
            exit();
        } else {
            echo "Error removing product from cart.";
        }
    } else {
        echo "Cart not found for the user.";
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // Handle errors if user_id is not set or id is not provided
    echo "Invalid request.";
}
?>