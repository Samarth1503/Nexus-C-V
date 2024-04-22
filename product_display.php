<?php
// Establish a database connection
$con = mysqli_connect('localhost', 'root', '', 'coupon_store');

if (!$con) {
    die('Error: Could not connect to the database.');
}

// Retrieve the category filter from the query string
$categoryFilter = isset($_GET['filter']) ? $_GET['filter'] : 'All';

// Query to retrieve rows from the 'coupon' table based on the category filter
$query = "SELECT * FROM coupon";
if ($categoryFilter !== 'All') {
    $query .= " WHERE category = '$categoryFilter'";
}

$result = mysqli_query($con, $query);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
// Loop through the result set and generate HTML for each row
while ($row = mysqli_fetch_assoc($result)) {
    // Use the Coupon_id as the id for the Prod div
    echo '<div class="Prod Prod1 ' . htmlspecialchars($row['category']) . '" id="' . htmlspecialchars($row['Coupon_id']) . '">';
    echo '<div class="ribbon">';
    echo '<span>Pack of ' . htmlspecialchars($row['quantity']) . '</span>';
    echo '</div>';
    echo '<div class="ProdLogoDiv">';
    echo '<img class="ProdImg" src="' . htmlspecialchars($row['image_src']) . '">';
    echo '</div>';
    echo '<div class="ProdDescriptionDiv">'; 
    echo '<hr>';
    echo '<span>' . htmlspecialchars($row['coupon_desc']) . '</span>';
    echo '</div>';
    echo '<div class="ProdPriceCartDiv">';
    echo '<div class="ProdPriceDiv">';
    echo '<span>₹' . number_format($row['price']) . '</span>';
    echo '</div>';
    echo '<div class="ProdAddToCart" onclick="retrieveParentId(this); return false;">';
    echo '<span>Add to Cart</span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    // echo '<br>';
    } 
}
else {
echo 'Sorry ' . htmlspecialchars($categoryFilter) . ' products are out of Stock.';
}


// Close the database connection
mysqli_close($con);
?>