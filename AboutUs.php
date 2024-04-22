<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- css link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Index.css">
    <link rel="stylesheet" type="text/css" href="AboutUsCss.css">
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
                    <script>
                      // Get the switch element
                      const switchElement = document.getElementById('fs');

                      // Add an event listener for the change event on the switch
                      switchElement.addEventListener('change', function() {
                          // Get the root HTML element
                          const rootElement = document.documentElement;

                          // Check if the switch is checked (inverted) or not
                          if (switchElement.checked) {
                              // If checked, remove the 'inverted' class to revert to normal colors
                              rootElement.classList.remove('inverted');
                          } else {
                              // If not checked, add the 'inverted' class to invert the colors
                              rootElement.classList.add('inverted');
                          }
                      });
                    </script>
                </div>
            </div>
          </li>
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

    <!-- <script>
        const logoutLink = document.getElementById("logoutLink");
        const confirmationPopup = document.getElementById("confirmationPopup");
        const confirmLogoutButton = document.getElementById("confirmLogout");
        const cancelLogoutButton = document.getElementById("cancelLogout");
        const backDropForOverlay1 = document.getElementById('backDropForOverlay1');

        // Show the confirmation popup when clicking the logout link
        logoutLink.addEventListener("click", () => {
            backDropForOverlay1.style.display = 'flex';
            confirmationPopup.style.display = "flex";
        });

        // Handle logout confirmation
        confirmLogoutButton.addEventListener("click", () => {
            // Add your logout logic here, such as redirecting to a logout page
            // For example, you can use window.location.href = 'logout.php';

            // For this example, we'll just close the popup
            backDropForOverlay1.style.display = 'none';
            confirmationPopup.style.display = "none";
        });

        // Close the confirmation popup when clicking the "No" button
        cancelLogoutButton.addEventListener("click", () => {
            backDropForOverlay1.style.display = 'none';
            confirmationPopup.style.display = "none";
        });


        // Get references to the link and the confirmation dialog
        const deleteAccountLink = document.getElementById('delete-account-link');
        const confirmationDialog = document.getElementById('confirmation-dialog');
        const backDropForOverlay2 = document.getElementById('backDropForOverlay2');

        // Add a click event listener to the link
        deleteAccountLink.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the link from navigating

            // Show the confirmation dialog
            backDropForOverlay2.style.display = 'flex';
            confirmationDialog.style.display = 'flex';
        });

        // Add a click event listener to the "Yes" button in the dialog
        const confirmDeleteButton = document.getElementById('confirm-delete');
        confirmDeleteButton.addEventListener('click', function () {
            // Perform the actual account deletion logic here, e.g., via AJAX
            alert('Account deleted!'); // For demonstration purposes

            // Close the confirmation dialog
            backDropForOverlay2.style.display = 'none';
            confirmationDialog.style.display = 'none';
        });

        // Add a click event listener to the "Cancel" button in the dialog
        const cancelDeleteButton = document.getElementById('cancel-delete');
        cancelDeleteButton.addEventListener('click', function () {
            // Close the confirmation dialog without deleting the account
            backDropForOverlay2.style.display = 'none';
            confirmationDialog.style.display = 'none';
        });


        const contactUsTrigger = document.getElementById('contactUsTrigger');
        const contactUsDialog = document.getElementById('contactUsDialog');
        const backDropForOverlay3 = document.getElementById('backDropForOverlay3');

        // Function to hide the dialog and backdrop
        function hideContactDialog() {
            backDropForOverlay3.style.display = "none";
            contactUsDialog.style.display = "none";
        }

        // Add a click event listener to the link
        contactUsTrigger.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the link from navigating

            // Show the confirmation dialog
            backDropForOverlay3.style.display = 'flex';
            contactUsDialog.style.display = 'flex';
        });

        // Add a click event listener to the "Submit" button in the dialog
        const contactUsSubmitButton = document.getElementById('contactUsSubmit');
        contactUsSubmitButton.addEventListener('click', function () {
            // Perform the actual form submission logic here, e.g., via AJAX
            alert('We will contact you as soon as possible'); // For demonstration purposes

            // Close the confirmation dialog
            hideContactDialog();
        });

        // Add a click event listener to the backdrop
        backDropForOverlay3.addEventListener("click", hideContactDialog);

    </script> -->



    <div class="aboutUsContainer">
        <h1>About Us</h1>
        <p>Welcome to Cupons & Vouchers, your trusted source for business savings!</p>
        <p>At C&A, we specialize in providing exclusive discounts and deals to businesses of all sizes. Our mission is to help your company save money on essential products and services, enabling you to focus on what matters most – growing your business.</p>
        <p>Our team is dedicated to curating the best offers from a wide range of suppliers and service providers. Whether you're looking for discounts on office supplies, software, marketing services, or any other business essentials, we've got you covered.</p>
        <p>We believe that every rupee saved is a rupee earned, and that's why we're committed to helping businesses like yours thrive by reducing your operational costs.</p>
        <p>Thank you for choosing C&A as your partner in savings. Feel free to explore our website and start saving today!</p>
        <ul>
          <li>Extensive Selection: We curate a vast collection of coupons and discounts across various categories and brands.</li>
          <li>Verified Offers: Our team ensures that all offers are up-to-date and valid, so you can shop with confidence.</li>
          <li>User-Friendly: Our website is designed to be easy to navigate, making it simple to find the coupons you need.</li>
          <li>Helpful Resources: We provide shopping tips and guides to maximize your savings.</li>
        </ul>
        <br><br>
        <h2>Contact Us</h2>
        <p>If you have any questions, feedback, or partnership inquiries, please don't hesitate to contact us at bNc@gmail.com <br>We'd love to hear from you!</p>
    </div>

</body>
</html>


