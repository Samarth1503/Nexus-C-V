<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $host = "localhost"; // Change to your database host
    $username = "root"; // Change to your database username
    $password = ""; // Change to your database password
    $database = "coupon_store"; // Change to your database name

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get values from the form
    $email = $_POST["login-email"];
    $password = $_POST["login-password"];

    // Check if the email and password exist in the 'customer' table
    $sql = "SELECT Cust_ID, Cust_name FROM customer WHERE Cust_email = ? AND Cust_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // User is authenticated; store user data in session variables
            $stmt->bind_result($user_id, $user_name);
            $stmt->fetch();
            global $_SESSION;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_name"] = $user_name;

            header("Location: http://localhost/project-pushkar/Index.php"); // Redirect to the user's dashboard
           
        } else {
            echo "Invalid email or password. Please try again.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
