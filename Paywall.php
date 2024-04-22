<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paywall Authentication</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Index.css">
    <link rel="stylesheet" type="text/css" href="PayWallCss.css">
</head>
<body>


    
  <!-- og code -->
  <nav id='menu'>
    <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label class="MenuLabel"></label>
    <ul class="MenuUl">
        <div class="MenuHeading">
          <li><img class="MenuLogoImg" src="images used\FestivalGridImages\Logo.jpg"/></li>
        </div>
      <div class="MenuHeading">
        <li><a href='https://localhost/project-pushkar/Index.php'>Home</a></li>
      </div>
      <div class="MenuHeading">
        <li><a href='https://localhost/project-pushkar/AboutUs.php'>About Us</a></li>
      </div>
      <div class="MenuHeading">
        <li><a href='https://localhost/project-pushkar/Index.php#shopDiv'>Shop</a></li>
      </div>
      <div class="MenuHeading">
        <li><a id="contactUsTrigger">Contact Us</a></li>
      </div>
      <div class="MenuHeading">
        <li><a class="navBarDropDown UserAccountDiv" href="#">
          <img src="images used/user.png" class="UserIcon">
          <?php
            session_start();
            // Check if the user is logged in (has an active session)
            if (isset($_SESSION["user_name"])) {
              echo 'Hello ' . $_SESSION["user_name"];
            } else {
              echo 'Hello Guest';
            }
          ?>
        </a>
          <ul class='navBarSub-menus'>
          <li><a id="logoutLink">Logout</a></li>
          
          <li><a id="delete-account-link">Delete Account</a></li>

          </ul>
        </li>
      </div>
    </ul>

      <li>
        <div class="dark-mode__toggler-container">

            <!-- <a href='http://'>ThemeDiv</a> -->
            <!-- Not responsive yet -->
            <!-- add resposive sizes to @media (max-width: 60em) & if required to @media (max-width: 30em) as well -->
            <!-- Once colour scheme is final, add a dark mode colour scheme with css or js -->
            
            <div class="flipswitch">
                <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="fs" checked>
                <label class="flipswitch-label" for="fs">
                    <div class="flipswitch-inner"></div>
                    <div class="flipswitch-switch"></div>
                </label>
            </div>
        </div>
      </li>
  </nav>


  

    <!-- Logout Account Confirmation dialog -->
    <div id="backDropForOverlay"></div>
    <div id="confirmationPopup">
      <br>
      <div>
        <h2>Confirm Logout</h2>
      </div>
      <br>
      <div>
        <p>Are you sure you want to logout?</p>
      </div>
      <div>
        <button type="submit" id="confirmLogout"><a href="logout.php">Yes</a></button>
        <button id="cancelLogout">No</button>
      </div>
    </div>

    <!-- Delete Account Confirmation dialog -->
    <div id="backDropForOverlay"></div>
    <div id="confirmation-dialog">
      <br>
      <div>
        <h2>Confirm Deletion</h2>
      </div>
      <br>
      <div>
        <p>Are you sure you want to delete your account?</p>
      </div>
      <div>
        <button type="submit" id="confirm-delete">Yes</button>
        <button id="cancel-delete">Cancel</button>
      </div>
    </div>
    
    <script>
      // Add a click event listener to the "Yes" button
      document.getElementById("confirm-delete").addEventListener("click", function () {
          // Redirect to the specified URL
          window.location.href = "https://localhost/project-pushkar/Index.php";
        });
        // Add a click event listener to the "Yes" button
        document.getElementById("confirmLogout").addEventListener("click", function () {
        // Redirect to the specified URL
        window.location.href = "https://localhost/project-pushkar/Index.php";
      });
    </script>

    <!-- Contact Us dialog -->
    <div id="backDropForOverlay"></div>
    <div id="contactUsDialog">
      <h2>Contact Us</h2>
      <hr>
      <form id="contactUsForm" action="process_contact.php" method="post">
        <div>
          <label for="name">Name :</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div>
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div>
          <label for="message">Message :</label>
          <textarea id="message" name="message"  rows="3" cols="25" required></textarea>
        </div>
        <div id="buttonsDiv">
          <input type="submit" value="Submit" id="contactUsSubmit">
          <input type="reset" id="reset" name="reset" required>
        </div>
      </form>
    </div>

    <script>
    const backdrop = document.getElementById("backDropForOverlay");
    const confirmationPopup = document.getElementById("confirmationPopup");
    const confirmationDialog = document.getElementById("confirmation-dialog");
    const contactUsDialog = document.getElementById("contactUsDialog");

    function hideDialog() {
        backdrop.style.display = 'none';
        confirmationPopup.style.display = 'none';
        confirmationDialog.style.display = 'none';
        contactUsDialog.style.display = 'none';
    }

    // Add a click event listener to the backdrop to close any dialog
    backdrop.addEventListener("click", hideDialog);

    // Show the confirmation popup when clicking the logout link
    const logoutLink = document.getElementById("logoutLink");
    logoutLink.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent the link from navigating
        hideDialog();
        backdrop.style.display = 'flex';
        confirmationPopup.style.display = 'flex';
    });

    // Handle logout confirmation
    const confirmLogoutButton = document.getElementById("confirmLogout");
    confirmLogoutButton.addEventListener("click", () => {
        // Add your logout logic here, such as redirecting to a logout page
        // For example, you can use window.location.href = 'logout.php';

        // For this example, we'll just close the popup
        hideDialog();
    });

    // Close the confirmation popup when clicking the "No" button
    const cancelLogoutButton = document.getElementById("cancelLogout");
    cancelLogoutButton.addEventListener("click", hideDialog);

    // Get references to the link and the confirmation dialog
    const deleteAccountLink = document.getElementById('delete-account-link');
    deleteAccountLink.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the link from navigating
        hideDialog();
        backdrop.style.display = 'flex';
        confirmationDialog.style.display = 'flex';
    });

    // Add a click event listener to the "Yes" button in the delete account dialog
    const confirmDeleteButton = document.getElementById('confirm-delete');
    confirmDeleteButton.addEventListener('click', function () {
        // Perform the actual account deletion logic here, e.g., via AJAX
        alert('Account deleted!'); // For demonstration purposes
        hideDialog();
    });

    // Add a click event listener to the "Cancel" button in the delete account dialog
    const cancelDeleteButton = document.getElementById('cancel-delete');
    cancelDeleteButton.addEventListener('click', hideDialog);

    // Get a reference to the contact us trigger
    const contactUsTrigger = document.getElementById('contactUsTrigger');
    contactUsTrigger.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the link from navigating
        hideDialog();
        backdrop.style.display = 'flex';
        contactUsDialog.style.display = 'flex';
    });

    // Add a click event listener to the "Submit" button in the contact us dialog
    const contactUsSubmitButton = document.getElementById('contactUsSubmit');
    contactUsSubmitButton.addEventListener('click', function () {
        // Perform the actual form submission logic here, e.g., via AJAX
        alert('We will contact you as soon as possible'); // For demonstration purposes
        hideDialog();
    });
    </script>



    <div class="paymentContainer">
        <div class="selectPaymentMethod">
            <h1>Select Payment Mode</h1>

            <form id="paymentMethodForm" class="paymentMethodForm">
                <label>
                    <input type="radio" name="paymentMethod" value="NEFT"> NEFT
                </label><br>
                <label>
                    <input type="radio" name="paymentMethod" value="RTGS"> RTGS
                </label><br>
                <label>
                    <input type="radio" name="paymentMethod" value="IMPS"> IMPS
                </label><br>
                <label>
                    <input type="radio" name="paymentMethod" value="CreditCard"> Credit Card
                </label><br>
                <label>
                    <input type="radio" name="paymentMethod" value="DebitCard"> Debit Card
                </label><br>
                <button type="submit">Proceed</button>
            </form>
        
        </div>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database connection settings
            $dbHost = "localhost";
            $dbUsername = "root"; // Replace with your MySQL username
            $dbPassword = "";     // Replace with your MySQL password
            $dbName = "coupon_store";

            // Create a database connection
            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            // Check the connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            
            // Get selected payment method from the form
            if (isset($_POST["paymentMethod"])) {
                $paymentMethod = $_POST["paymentMethod"];
                
                // Get the current date
                $currentDate = date('Y-m-d');

                // Insert the data into the receipt table
                $sql = "INSERT INTO receipt (ModeOfPayment, Receipt_Date, CartID) VALUES (?, ?, NULL)";
                $stmt = $conn->prepare($sql);
                
                if ($stmt) {
                    $stmt->bind_param("ss", $paymentMethod, $currentDate);
                    if ($stmt->execute()) {
                        echo "Payment mode selected and receipt created successfully!";
                    } else {
                        echo "Error creating receipt: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }
            } else {
                echo "Payment method not selected!";
            }

            // Close the database connection
            $conn->close();
        }
        ?>

        <div class="PaymentFormDivision">

            <!-- NEFT Payment Form -->
            <form id="NEFTPaymentForm" class="PayForm" style="display: none;">
                <div>
                    <label for="accountHolderNameNEFT">Account Holder Name:</label>
                    <input type="text" id="accountHolderNameNEFT" name="accountHolderNameNEFT" required><br>
                </div>
                
                <div>
                    <label for="accountNumberNEFT">Account Number:</label>
                    <input type="text" id="accountNumberNEFT" name="accountNumberNEFT" required><br>
                </div>
                
                <div>
                    <label for="confirmAccountNumberNEFT">Confirm A/C Number:</label>
                    <input type="text" id="confirmAccountNumberNEFT" name="confirmAccountNumberNEFT" required><br>
                </div>
                
                <div>
                    <label for="ifscCodeNEFT">IFSC Code:</label>
                    <input type="text" id="ifscCodeNEFT" name="ifscCodeNEFT" required><br>
                </div>
                
                <div>
                    <label for="amountNEFT">Amount:</label>
                    <input type="number" id="amountNEFT" name="amountNEFT" required><br>
                </div>
                
                <div class="payFormSubmit">
                    <button type="submit" onclick="openPayWall()">Pay Now</button>
                </div>
            </form>

            <!-- RTGS Payment Form -->
            <form id="RTGSPaymentForm" class="PayForm" style="display: none;">
                <div>
                    <label for="accountHolderNameRTGS">Account Holder Name:</label>
                    <input type="text" id="accountHolderNameRTGS" name="accountHolderNameRTGS" required><br>
                </div>
                
                <div>
                    <label for="accountNumberRTGS">Account Number:</label>
                    <input type="text" id="accountNumberRTGS" name="accountNumberRTGS" required><br>
                </div>
                
                <div>
                    <label for="confirmAccountNumberRTGS">Confirm A/C Number:</label>
                    <input type="text" id="confirmAccountNumberRTGS" name="confirmAccountNumberRTGS" required><br>
                </div>
                
                <div>
                    <label for="ifscCodeRTGS">IFSC Code:</label>
                    <input type="text" id="ifscCodeRTGS" name="ifscCodeRTGS" required><br>
                </div>
                
                <div>
                    <label for="amountRTGS">Amount:</label>
                    <input type="number" id="amountRTGS" name="amountRTGS" required><br>
                </div>
                
                <div class="payFormSubmit">
                    <button type="submit" onclick="openPayWall()">Pay Now</button>
                </div>
            </form>

            <!-- IMPS Payment Form -->
            <form id="IMPSPaymentForm" class="PayForm" style="display: none;">
                <div>
                    <label for="accountHolderNameIMPS">Account Holder Name:</label>
                    <input type="text" id="accountHolderNameIMPS" name="accountHolderNameIMPS" required><br>
                </div>
                
                <div>
                    <label for="accountNumberIMPS">Account Number:</label>
                    <input type="text" id="accountNumberIMPS" name="accountNumberIMPS" required><br>
                </div>
                
                <div>
                    <label for="confirmAccountNumberIMPS">Confirm A/C Number:</label>
                    <input type="text" id="confirmAccountNumberIMPS" name="confirmAccountNumberIMPS" required><br>
                </div>
                
                <div>
                    <label for="ifscCodeIMPS">IFSC Code:</label>
                    <input type="text" id="ifscCodeIMPS" name="ifscCodeIMPS" required><br>
                </div>
                
                <div>
                    <label for="amountIMPS">Amount:</label>
                    <input type="number" id="amountIMPS" name="amountIMPS" required><br>
                </div>
                
                <div class="payFormSubmit">
                    <button type="submit" onclick="openPayWall()">Pay Now</button>
                </div>
            </form>

            <!-- Credit Card Payment Form -->
            <form id="CreditCardPaymentForm" class="PayForm" style="display: none;">
                <div>
                    <label for="creditCardNumber">Card Number:</label>
                    <input type="text" id="creditCardNumber" name="creditCardNumber" required><br>
                </div>
                
                <div>
                    <label for="creditExpirationDate">Expiry (MM/YY):</label>
                    <input type="text" id="creditExpirationDate" name="creditExpirationDate" placeholder="MM/YY" required><br>
                </div>
                
                <div>
                    <label for="creditCvv">CVV:</label>
                    <input type="text" id="creditCvv" name="creditCvv" required><br>
                </div>
                
                <div>
                    <label for="creditCardholderName">Cardholder's Name:</label>
                    <input type="text" id="creditCardholderName" name="creditCardholderName" required><br>
                </div>
                
                <div class="payFormSubmit">
                    <button type="submit" onclick="openPayWall()">Pay Now</button>
                </div>
            </form>

            <!-- Debit Card Payment Form -->
            <form id="DebitCardPaymentForm" class="PayForm" style="display: none;">
                <div>
                    <label for="debitCardNumber">Card Number:</label>
                    <input type="text" id="debitCardNumber" name="debitCardNumber" required><br>
                </div>
                
                <div>
                    <label for="debitExpirationDate">Expiry (MM/YY):</label>
                    <input type="text" id="debitExpirationDate" name="debitExpirationDate" placeholder="MM/YY" required><br>
                </div>
                
                <div>
                    <label for="debitCvv">CVV:</label>
                    <input type="text" id="debitCvv" name="debitCvv" required><br>
                </div>
                
                <div>
                    <label for="debitCardholderName">Cardholder's Name:</label>
                    <input type="text" id="debitCardholderName" name="debitCardholderName" required><br>
                </div>
                
                <div class="payFormSubmit">
                    <button type="submit" onclick="openPayWall()">Pay Now</button>
                </div>
            </form>

        </div>

    </div>



    <!-- Payment status message -->
    <div id="paymentStatus"></div>

    <!-- JavaScript for handling form submissions and processing -->
    <script>
        // Confirming the account number
        function handleFormSubmission(formId) {
            const form = document.getElementById(formId);

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Get the input values
                const accountNumber = document.getElementById(`accountNumber${formId}`).value;
                const confirmAccountNumber = document.getElementById(`confirmAccountNumber${formId}`).value;

                // Check if the account numbers match
                if (accountNumber !== confirmAccountNumber) {
                    alert('Account Numbers do not match. Please double-check.');
                } else {
                    // Disable the submit button to prevent multiple submissions
                    const submitButton = form.querySelector('button[type="submit"]');
                    submitButton.disabled = true;

                    // Continue with form submission or payment processing logic
                    // In this example, we'll simulate a payment processing delay
                    simulatePaymentProcessing(formId);
                }
            });
        }

        // Call the function for each payment form
        handleFormSubmission('NEFTPaymentForm');
        handleFormSubmission('RTGSPaymentForm');
        handleFormSubmission('IMPSPaymentForm');

        // Function to simulate payment processing
        function simulatePaymentProcessing(formId) {
            // Replace the following code with your actual payment processing logic
            setTimeout(function () {
                const success = Math.random() < 0.5; // Simulate success or failure

                if (success) {
                    document.getElementById('paymentStatus').innerHTML = 'Payment successful!';
                } else {
                    document.getElementById('paymentStatus').innerHTML = 'Payment failed. Please try again.';
                }

                // Re-enable the submit button after processing is complete
                const form = document.getElementById(formId);
                const submitButton = form.querySelector('button[type="submit"]');
                submitButton.disabled = false;
            }, 2000);
        }


        document.getElementById('paymentMethodForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked');

            if (!selectedPaymentMethod) {
                alert('Please select a payment method.');
                return;
            }

            const paymentMethod = selectedPaymentMethod.value;
            const totalAmount = 45; // Total amount to be paid

            // Hide all payment method forms
            document.querySelectorAll('form[id$="PaymentForm"]').forEach(form => {
                form.style.display = 'none';
            });

            // Display the selected payment method form
            document.getElementById(paymentMethod + 'PaymentForm').style.display = 'block';
        });
    </script>

    <!-- JavaScript for handling payment form submissions and processing -->
    <script>
        // Define JavaScript logic for processing each payment method here
        // Replace the setTimeout code with actual payment processing logic
        // For credit card and debit card forms, make sure to handle them separately

        function simulatePaymentProcessing(formId) {
            const form = document.getElementById(formId);

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Replace the following code with actual payment processing logic
                setTimeout(function () {
                    const success = Math.random() < 0.5; // Simulate success or failure

                    if (success) {
                        document.getElementById('paymentStatus').innerHTML = 'Payment successful!';
                    } else {
                        document.getElementById('paymentStatus').innerHTML = 'Payment failed. Please try again.';
                    }
                }, 2000);
            });
        }


        function handleCreditCardPaymentForm() {
        const creditCardForm = document.getElementById('creditCardPaymentForm');

        creditCardForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Gather payment details from the credit card form
            const cardNumber = document.getElementById('cardNumber').value;
            const expirationDate = document.getElementById('expirationDate').value;
            const cvv = document.getElementById('cvv').value;
            const cardholderName = document.getElementById('cardholderName').value;

            // Simulate payment processing (replace with actual payment processing logic)
            setTimeout(function () {
                const success = Math.random() < 0.5; // Simulate success or failure

                if (success) {
                    document.getElementById('paymentStatus').innerHTML = 'Credit Card Payment successful!';
                } else {
                    document.getElementById('paymentStatus').innerHTML = 'Credit Card Payment failed. Please try again.';
                }
            }, 2000);
        });
    }

    // Call the function to handle the credit card form
    handleCreditCardPaymentForm();


    function handleDebitCardPaymentForm() {
        const debitCardForm = document.getElementById('debitCardPaymentForm');

        debitCardForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Gather payment details from the debit card form
            const cardNumber = document.getElementById('debitCardNumber').value;
            const expirationDate = document.getElementById('debitExpirationDate').value;
            const cvv = document.getElementById('debitCvv').value;
            const cardholderName = document.getElementById('debitCardholderName').value;

            // Simulate payment processing (replace with actual payment processing logic)
            setTimeout(function () {
                const success = Math.random() < 0.5; // Simulate success or failure

                if (success) {
                    document.getElementById('paymentStatus').innerHTML = 'Debit Card Payment successful!';
                } else {
                    document.getElementById('paymentStatus').innerHTML = 'Debit Card Payment failed. Please try again.';
                }
            }, 2000);
        });
    }

    // Call the function to handle the debit card form
    handleDebitCardPaymentForm();

        // Simulate payment processing for each payment form
        simulatePaymentProcessing('NEFTPaymentForm');
        simulatePaymentProcessing('RTGSPaymentForm');
        simulatePaymentProcessing('IMPSPaymentForm');
        simulatePaymentProcessing('creditCardPaymentForm');
        simulatePaymentProcessing('debitCardPaymentForm');

        function openPayWall() {
            // Specify the URL you want to open in a new tab or window
            var link = "http://localhost/project-pushkar/PrintReceipt.php"; // Replace with your desired URL

            // Navigate to the specified URL in the same tab
            window.location.href = link;
        }
    </script>
</body>
</html>
