<?php
// Check if the form was submitted
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
    $name = $_POST["reg-name"];
    $email = $_POST["reg-email"];
    $contactNumber = $_POST["reg-contactNumber"];
    $password = $_POST["reg-password"];

    // Check if the email already exists in the 'customer' table
    $checkEmailQuery = "SELECT Cust_ID FROM customer WHERE Cust_email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Account already exists with this email.";
    } else {
        // Email doesn't exist; insert data into the 'customer' table
        $insertQuery = "INSERT INTO customer (Cust_email, Cust_name, Cust_contact, Cust_password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $email, $name, $contactNumber, $password);

        if ($stmt->execute()) {
            echo "Registration successful!";
            
            // Retrieve the Cust_ID of the registered user
            $getCustomerIdQuery = "SELECT Cust_ID FROM customer WHERE Cust_email = ?";
            $stmt = $conn->prepare($getCustomerIdQuery);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($custId);
            $stmt->fetch();
            
            // Close the previous statement
            $stmt->close();
            
            // Insert the Cust_ID into the 'cart' table
            $insertCartIdQuery = "INSERT INTO cart (Cust_ID) VALUES (?)";
            $stmt = $conn->prepare($insertCartIdQuery);
            $stmt->bind_param("i", $custId);
            
            if ($stmt->execute()) {
                echo "Cust_ID inserted into cart table as cart_id.";
                header("Location: http://localhost/project-pushkar/Login.php");
            } else {
                echo "Error inserting Cust_ID into cart table: " . $stmt->error;
            }
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>