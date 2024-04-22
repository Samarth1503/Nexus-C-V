<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- css link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Index.css">
    <link rel="stylesheet" type="text/css" href="Cartcss.css">

</head>
<body>

    <!-- og code -->
    <nav id='menu'>
        <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label class="MenuLabel"></label>
        <ul class="MenuUl">
            <div class="MenuHeading">
              <li><a class="MenuLogo" href='https://localhost/project-pushkar/Index.php'><img class="MenuLogoImg" src="images used\FestivalGridImages\Logo.jpg"/></a></li>
            </div>
          <div class="MenuHeading">
            <li><a href='https://localhost/project-pushkar/Index.php'>Home</a></li>
          </div>
          <div class="MenuHeading">
            <li><a href='https://localhost/project-pushkar/AboutUs.php'>About Us</a></li>
          </div>
          <div class="MenuHeading">
            <li><a href="https://localhost/project-pushkar/Index.php#shopDiv">Shop</a></li>
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
                  echo '<style>.NavBarLogin { display: none; };</style>';
                  echo '<style>.NavBarRegister { display: none; };</style>';
                } else {
                  echo 'Hello Guest';
                  echo '<style>#menu li:hover ul.navBarSub-menus {display: none}</style>';
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
        <div class="MenuHeading NavBarLogin">
          <li><a href='http://localhost/project-pushkar/Login.php'>Login</a></li>
        </div>
        <div class="MenuHeading NavBarRegister">
          <li><a href='http://localhost/project-pushkar/Signup.php'>Register</a></li>
        </div>
          <div class="CartDiv">     </div>
    </nav>
    <input type="checkbox" id="cartActive">
      <label for="cartActive" class="menu-btn">
        <img src="images used/ShoppingCart.png" class="ShoppingCartImg"/>
        <img src="images used/Close-white.png" class="CloseShoppingCartImg"/>
      </label>
      <label for="cartActive" class="close"></label>
      <div class="cartWrapper wrapper">
          <div class="ViewCartContainer">
              <div class="CartHeading">
                  <span>Your Cart</span>
              </div>
              <div class="CartProductsList">
                <?php 
                include('floating_cart_display.php');
                ?>
              </div>
              <div class="ViewCartButton">
                <div class="button -regular"><a href="fullcart.php" id="viewCartButton">View Cart</a></div>
              </div>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
          const viewCartButton = document.getElementById("viewCartButton");

          if (viewCartButton) {
              viewCartButton.addEventListener("click", function(event) {
                  event.preventDefault(); // Prevent the default behavior of the anchor tag
                  // Redirect to the "fullcart.php" page
                  window.location.href = viewCartButton.getAttribute("href");
              });
          }
      });
    </script>

              <div class="ClearCartButton">
                <div class="button -regular"><a href="clearcart.php" id="clearCartButton">Clear Cart</a></div>
              </div>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
          const clearCartButton = document.getElementById("clearCartButton");

          if (clearCartButton) {
              clearCartButton.addEventListener("click", function(event) {
                  event.preventDefault(); // Prevent the default behavior of the anchor tag
                  // Redirect to the "clearcart.php" page
                  window.location.href = clearCartButton.getAttribute("href");
              });
          }
      });
    </script>
          </div>
      </div>

<!-- script for nav bar -->
      <script>
      function updatemenu() {
        if (document.getElementById('responsive-menu').checked == true) {
          document.getElementById('menu').style.borderBottomRightRadius = '0';
          document.getElementById('menu').style.borderBottomLeftRadius = '0';
        }else{
          document.getElementById('menu').style.borderRadius = '10px';
        }
      }
      </script>



<!-- Scroll to the Top section -->

<button id="scrollToTopButton"><p>↑</p></button>
<script>
  // Get a reference to the button element
  const scrollToTopButton = document.getElementById("scrollToTopButton");

  // Add a scroll event listener to check when to show or hide the button
  window.addEventListener("scroll", () => {
      if (document.documentElement.scrollTop > 100) {
          scrollToTopButton.style.display = "block";
      } else {
          scrollToTopButton.style.display = "none";
      }
  });

  // Add a click event listener to scroll to the top when the button is clicked
  scrollToTopButton.addEventListener("click", () => {
      document.documentElement.scrollTo({
          top: 0,
          behavior: "smooth"
      });
  });
</script>


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


<div class="container">
    <div class="cartHeader">
        <div><h2>Your Cart</h2></div>
        <div class="clearcart">
            <a href="clearcart.php">Clear Cart</a>
        </div>
    </div>

    <div class="cartContainer">
        <div class="items-container">

<?php

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

        // Retrieve coupon_id values from cart_master where cart_id matches.
        $coupon_id_query = "SELECT coupon_id FROM cart_master WHERE cart_id = $cart_id";

        $coupon_id_result = mysqli_query($conn, $coupon_id_query);

        if (!$coupon_id_result) {
            die("Error: " . mysqli_error($conn));
        }

        // Create an array to store coupon IDs.
        $coupon_ids = array();

        while ($coupon_id_row = mysqli_fetch_assoc($coupon_id_result)) {
            $coupon_ids[] = $coupon_id_row["coupon_id"];
        }

        // Check if any coupons are in the cart.
        if (count($coupon_ids) > 0) {
            // Retrieve rows from the coupon table where coupon_id matches.
            $coupon_data_query = "SELECT * FROM coupon WHERE coupon_id IN (" . implode(",", $coupon_ids) . ")";

            $coupon_data_result = mysqli_query($conn, $coupon_data_query);

            if (!$coupon_data_result) {
                die("Error: " . mysqli_error($conn));
            }

            // Loop through coupon rows and generate HTML for each coupon.
            while ($coupon_row = mysqli_fetch_assoc($coupon_data_result)) {
                echo '<div class="cart_prod" id="' . $coupon_row["Coupon_id"] . '">
                    <div class="cart_prod_img">
                        <img src="' . $coupon_row["image_src"] . '" alt="imghere">
                    </div>
                    <div class="cart_prod_brand">
                        <p>' . $coupon_row["brand"] . '</p>
                        <p>' . $coupon_row["coupon_desc"] . '</p>
                    </div>
            
                    <div class="cart_prod_price cart_prod_details">
                        <p> Price: </p><p>₹ ' . $coupon_row["price"] . '</p>
                    </div>
                    <div class="cart_prod_quantity cart_prod_details">
                        <p> Pack of: </p><p>' . $coupon_row["quantity"] . '</p>
                    </div>
                    <div class="cart_prod_expiry cart_prod_details">
                        <p> Expiry: </p><p>' . $coupon_row["expiry"] . '</p>
                    </div>
                    
                    <div class="remove_product">
                        <a href="removefromcart.php" onclick="retrieveParentId(this); return false;"><img src="images used\remove.png"></a>
                    </div>
                </div>';
            }
        } else {
            echo "<p>Your cart is empty.</p>";
            echo "<style>.cartHeader{display: none}</style>";
            echo "<style>.cartContainer{height: 200px; width: 200px;}</style>";
            echo "<style>.cartContainer > div > p{margin-top: 25px;margin-left: 15px;}</style>";
            echo "<style>.container{display: flex; justify-content: center; align-items: center; height:100%}</style>";
            echo "<style>.checkout_wrapper{display: none}</style>";
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


       
</div>

    <div class="checkout_wrapper">
        <h1>Cart Checkout</h1>
        <hr>
        <div class="totalprice">
            <?php
                include('totalprice.php');
            ?>    
        </div>

        <div class="cart_buttons">
            
            <div class="checkout">
                <a href="Paywall.php">Checkout</a>
            </div>

            

        </div>
    </div>
</div>
</div>







<!-- javascript -->
<script>
    function matchHeights() {
        const itemsContainer = document.querySelector('.items-container');
        const summary = document.querySelector('.summary');

        // Get the height of the items container
        const itemsContainerHeight = itemsContainer.offsetHeight;

        // Set the height of the summary to match the items container
        summary.style.height = itemsContainerHeight + 'px';
    }

    // Run the matching heights function automatically when the page loads
    window.addEventListener('load', matchHeights);

    // You can also add an event listener for window resize to handle dynamic resizing
    window.addEventListener('resize', matchHeights);
</script>

<script>
    function retrieveParentId(linkElement) {
        // Find the closest parent with class 'Prod'
        var parentDiv = linkElement.closest('.cart_prod');

        if (parentDiv) {
            var parentId = parentDiv.id;

            // Send an AJAX request to the PHP script to execute it
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "removefromcart.php?id=" + parentId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        location.reload();
                    } else {
                        alert('An error occurred while making the request.');
                    }
                }
            };
            xhr.send();
        }
    }
</script>

</body>
</html>