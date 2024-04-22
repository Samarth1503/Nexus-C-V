<?php
// Check if user is logged in
if (isset($_SESSION["user_id"])) {
    // User is logged in, proceed with cart-related content
    // Connect to your database (replace with your database credentials)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "coupon_store";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve cart_id from the cart table
    $user_id = $_SESSION["user_id"];
    $sql = "SELECT cart_id FROM cart WHERE Cust_ID = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cart_id = $row["cart_id"];

        // Retrieve all Coupon_ID values from cart_master table and store them in an array
        $couponIds = array();
        $sql = "SELECT Coupon_ID FROM cart_master WHERE cart_id = $cart_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $couponIds[] = $row["Coupon_ID"];
            }
        }

        // Fetch all rows from the coupon table where Coupon_ID is in the array
        if (!empty($couponIds)) {
            $couponIdsStr = implode(",", $couponIds); // Convert array to a comma-separated string
            $sql = "SELECT * FROM coupon WHERE Coupon_ID IN ($couponIdsStr)";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Check if the keys exist in the $row array
                    if (isset($row["image_src"], $row["coupon_desc"], $row["quantity"], $row["price"])) {
                        // Generate HTML for each row
                        echo '
                            <div class="CartProdContainer">
                                <div class="CartProdImg CartProd1">
                                <img src="' . $row["image_src"] . '"/>
                                </div>
                                <div class="CartProdDesc ProductName1">
                                <p class="CartProductDesc">' . $row["coupon_desc"] . '</p>
                                </div>
                                <div class="CartPriceQuantity PriceQuantity1">
                                <p class="CartProductQuantity">Pack of ' . $row["quantity"] . '</p>
                                <p class="CartProductPrice">₹ ' . $row["price"] . '</p>
                                </div>
                            </div>
                          ';
                    } else {
                        // Handle the case where some key is missing
                        echo "Incomplete data for some items.";
                    }
                }
            } else {
                echo "No items in the cart.";
            }
        } else {
            echo "<p style='color: white'>CART IS EMPTY!</p>";
        }
    } else {
        echo "Cart not found for user.";
    }

    $conn->close();
}
?>