<?php


// Start a session if not already started
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    echo "User is not logged in.";
    exit;
}
$finalAmount = $_SESSION['finalAmount'];
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coupon_store";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the cart_id from the cart table
$userID = $_SESSION["user_id"];
$cartIDQuery = "SELECT cart_id FROM cart WHERE Cust_ID = $userID";
$result = $conn->query($cartIDQuery);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cartID = $row["cart_id"];

    // Insert into the receipt table
    $insertReceiptQuery = "INSERT INTO receipt (cart_id, receipt_date) VALUES ($cartID, NOW())";

    if ($conn->query($insertReceiptQuery) === TRUE) {
        // Get the receipt_id
        $receiptID = $conn->insert_id;

        // Get all Coupon_id from the cart_master where cart_id matches
        $getCouponIDsQuery = "SELECT Coupon_id FROM cart_master WHERE cart_id = $cartID";
        $couponIDsResult = $conn->query($getCouponIDsQuery);

        // Initialize an array to store coupon details
        $coupons = array();

        // Retrieve coupon details for each Coupon_id
        while ($couponRow = $couponIDsResult->fetch_assoc()) {
            $couponID = $couponRow["Coupon_id"];
            $getCouponDetailsQuery = "SELECT * FROM coupon WHERE Coupon_id = $couponID";
            $couponDetailsResult = $conn->query($getCouponDetailsQuery);

            if ($couponDetailsResult->num_rows > 0) {
                $couponDetails = $couponDetailsResult->fetch_assoc();
                $coupons[] = $couponDetails;
            }
        }
        
        // Insert each Coupon_id into the receipt_master
        while ($couponRow = $couponIDsResult->fetch_assoc()) {
            $couponID = $couponRow["Coupon_id"];
            $insertReceiptMasterQuery = "INSERT INTO receipt_master (receipt_id, Coupon_id) VALUES ($receiptID, $couponID)";
            $conn->query($insertReceiptMasterQuery);
        }

        // Calculate the number of coupons
        $numCoupons = $couponIDsResult->num_rows;

        // Update the global variable $product_sold
        global $product_sold;
        $product_sold += $numCoupons;

    } else {
        echo "Error inserting into receipt table: " . $conn->error;
    }
} else {
    echo "No cart found for the user.";
}

require_once('tcpdf/tcpdf.php');

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');

// Set document information
$pdf->SetCreator('C&V');
$pdf->SetAuthor('C&V');
$pdf->SetTitle('Receipt');
$pdf->SetSubject('Payment Receipt');
$pdf->SetKeywords('Receipt, Payment, Product');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);



// Set the time zone to India (GMT+5:30)
date_default_timezone_set('Asia/Kolkata');

// Generate the timestamp for the Indian time zone
$currentTimestamp = time(); // Current timestamp

// Format the timestamp to display date and time
$currentDateTime = date('l, j F Y, g:i:s A', $currentTimestamp);



// SQL query to retrieve the Cust_name for the given Cust_ID
$query = "SELECT Cust_name FROM customer WHERE Cust_ID = $userID";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
    
    // Get the Cust_name from the result
    $custName = $row["Cust_name"];
}




// HTML content to be converted to PDF
$html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Receipt</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="ReceiptCss.css">
    </head>
    <body>

        <div class="receipt">
            <div class="receiptHeader">
                <img src="Logo.jpg">
                <h2>Receipt</h2>
            </div>

            <!-- Receipt Table -->
            <table class="receipt-table">
                <tr>
                    <th>Receipt Number</th>
                    <td>123456</td>
                </tr>
                <tr>
                    <th>Receipt Date</th>
                    <td>' . $currentDateTime . '</td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td> ' . $custName . '</td>
                </tr>
            </table>
            <br><br>';

// Check if any coupons are in the cart.

// HTML content for the coupon details table
$html .= '<h2>Coupons</h2>
            <table class="cart-table">
                <tr>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>';
// PHP loop to generate cart table
foreach ($coupons as $item) {
    $html .= '
                <tr>
                    <td>' . $item['brand'] . '</td>
                    <td>' . $item['coupon_desc'] . '</td>
                    <td>' . $item['quantity'] . '</td>
                    <td> ' . $item['price'] . ' Rs.</td>
                </tr>';
}

$html .= '
                <tr>
                    <td colspan="3">Total Price</td>
                    <td> ' . $finalAmount . ' Rs.</td>
                </tr>
            </table>
            <br><br>
            <div class="barcodeDiv">
                <img src="images used/barcode.jpg" style="float: right; height: 50px;">
            </div>
            <p class="receiptFooter" style="font-size: 10px; text-align: center;">
                For any inquiries contact us on cNv@hotmail.com
            </p>
        </div>
    </body>
    </html>
    ';

    // Convert HTML to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // Close and output the PDF
    $pdf->Output('Receipt.pdf', 'I');

    include('clearcart.php');
?>