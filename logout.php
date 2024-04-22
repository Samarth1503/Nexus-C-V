<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other desired page
    header("Location:http://localhost/project-pushkar/Index.php"); // Change this to the appropriate URL
    exit();
    
} else {
    // If the user is not logged in, redirect to the login page
    header("Location:http://localhost/project-pushkar/Login.php"); // Change this to the appropriate URL
    exit();
}
?>
