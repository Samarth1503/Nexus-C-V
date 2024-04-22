<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "coupon_store";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $affiliate_brand_email = $_POST["affiliate-brand-email"];

    // Insert data into the database
    $sql = "INSERT INTO affiliate_brands (affiliate_brand_email) VALUES ('$affiliate_brand_email')";

    if (mysqli_query($conn, $sql)) {
        echo "<div style='margin-top:15vh;margin-left:33vw;font-size:30px;'>Welcome to Nexus CV we will Contact you shortly!</div>";
        echo "<div style='margin-left:30vw;'><img src='images used\affiliate_welcome.jpg' width='700px'></div>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>




