<?php
// Start the session if it hasn't already been started.
session_start();

// Check if the user is logged in (you can add your own authentication logic here).
if (isset($_SESSION["user_id"])) {
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

    if ($row) {
        $cart_id = $row["cart_id"];

        // Delete rows from cart_master where cart_id matches.
        $delete_cart_master_query = "DELETE FROM cart_master WHERE cart_id = $cart_id";

        if (mysqli_query($conn, $delete_cart_master_query)) {
            // Rows deleted successfully.

            // Redirect to Index.php or any other page as needed.
            header("Location: Index.php");
            exit();
        } else {
            // Error occurred while deleting rows.
            echo "Error deleting rows: " . mysqli_error($conn);
        }
    } else {
        echo "No cart found for this user.";
    }

    // Close the database connection.
    mysqli_close($conn);
} else {
    // Redirect the user to the login page if not logged in.
    header("Location: login.php");
    exit();
}
?>