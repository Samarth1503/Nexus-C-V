<?php

global $finalAmount;

// Check if the user is logged in (you can add your own authentication logic here).
if (isset($_SESSION["user_id"])) 
{
    // Assuming you have already established a database connection.
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "coupon_store";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection.
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the user_id from the session.
    $user_id = $_SESSION["user_id"];

    // Retrieve the cart_id associated with the user_id from the cart table.
    $cart_id_query = "SELECT cart_id FROM cart WHERE Cust_id = $user_id";

    $result = mysqli_query($conn, $cart_id_query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    // Assuming there's only one cart associated with a user, you can fetch it.
    $row = mysqli_fetch_assoc($result);
    // Previous code for session start, database connection, and retrieving cart_id
}
if ($row) {
    $cart_id = $row["cart_id"];

    // Retrieve coupon_id values from cart_master where cart_id matches.
    $coupon_id_query = "SELECT coupon_id FROM cart_master WHERE cart_id = $cart_id";

    $coupon_id_result = mysqli_query($conn, $coupon_id_query);

    if (!$coupon_id_result) {
        die("Error: " . mysqli_error($conn));
    }

    // Initialize variables for storing the total price.
    $totalPrice = 0;

    while ($coupon_row = mysqli_fetch_assoc($coupon_id_result)) {
        $coupon_id = $coupon_row["coupon_id"];

        // Retrieve the price for the coupon from the coupon table.
        $coupon_info_query = "SELECT price FROM coupon WHERE coupon_id = $coupon_id";

        $coupon_info_result = mysqli_query($conn, $coupon_info_query);

        if (!$coupon_info_result) {
            die("Error: " . mysqli_error($conn));
        }

        $coupon_info = mysqli_fetch_assoc($coupon_info_result);

        if ($coupon_info) {
            $price = $coupon_info["price"];
            $totalPrice += $price;
        }
    }

    // Calculate and print 7% of the total price.
    $percent7 = 0.07;
    $sevenPercent = $totalPrice * $percent7;
    $finalAmount =$totalPrice + $sevenPercent +$sevenPercent;
    $_SESSION['finalAmount'] = $finalAmount;
    echo "<div class='PriceCalcs'>";
    echo "<div><p>Total Price:</p><p> ₹ " . number_format($totalPrice, 2) . "</p></div><br>";
    echo "<div><p>7% CGST:</p><p> ₹ " . number_format($sevenPercent, 2) ."</p></div><br>";
    echo "<div><p>7% of SGST:</p><p> ₹ " . number_format($sevenPercent, 2) . "</p></div><br>";
    echo "<hr>";
    echo "<div><p>Final Amount:</p><p> ₹ " .number_format($finalAmount, 2). "</p></div>";
    echo "</div>";
    
} else {
    echo "No items in the cart.";
}

// Close the database connection
mysqli_close($conn);



?>   