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
</head>
<body>

  <!-- Script to scroll to specific div on click of a href -->
  <script>
      // Check if the element exists before adding the event listener
      const shopLink = document.querySelector('a[href="#shopDiv"]');
      if (shopLink) {
          shopLink.addEventListener('click', function (e) {
              e.preventDefault();
              const targetDiv = document.getElementById('targetShop');
              if (targetDiv) {
                  targetDiv.scrollIntoView({
                      top: targetDiv.offsetTop,
                      behavior: "smooth",
                      inline: 'nearest'
                  });
              }
          });
      }
  </script>


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
            <li><a href="#shopDiv">Shop</a></li>
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


<!-- Slider section -->
<div class="sliderSection">
  <div class="slider-container">
    
    <div class="slide sliderActive">
      <div class="slider-overlay">
        <div class="caption cap3">
          <div class="slide3-text1">
            Gadgets
          </div>
          <div class="slide3-text2">
            Stay Up to Date with the Latest Gadgets with Exclusive Deals!
          </div>
          <button>Buy Now</button>
        </div>
      </div>
        <img src="images used/Gadgets.jpg" alt="">
    </div>

    <div class="slide">
      <div class="slider-overlay">
        <div class="caption cap2">
          <div class="slide2-text1">
            Recognition Awards
          </div>
          <div class="slide2-text2">
            Bestow Exquisite Luxury upon Esteemed Corporate Executives
          </div>
          <button>Buy Now</button>
        </div>
      </div>
      <img src="images used/Gifts.webp" alt="">
    </div>

    <div class="slide">
      <div class="slider-overlay">
        <div class="caption cap1">
          <div>
              
          </div>
          <div class="slide1-text1">Winter Break</div>
          <div class="slide1-text2">
            Unlock Ultimate Hotel Deals for the Avid Traveler!
          </div>
          <button>Buy Now</button>
        </div>
      </div>
      <img src="images used/Snow.jpg" alt="">
    </div>

    <div class="slider-navigation">
      <div class="btn sliderActive"></div>
      <div class="btn "></div>
      <div class="btn "></div>
    </div>  
  </div>
</div>

  <script src="autoslider.js"></script>


<!-- OG Code -->
<div class="heroGridDiv">
  
  <h2 class="heroGridHeading">Explore Our Categories</h2>
  <ul class="heroGrid">
    <li>
      <a href="#CouponsDiv" class="categoryLink" data-filter="Medical">
        <img class="heroGridImg" src="images used\FestivalGridImages\medical-insurance-concept-flat-vector-illustration-banner-landing-page_128772-873.jpg" alt="">
        <span class="description">Medical</span>
      </a>
    </li>
    <li>
      <a href="#CouponsDiv" class="categoryLink" data-filter="Vacation">
        <img class="heroGridImg" src="images used\FestivalGridImages\12-Flexible-Companies-That-Help-Pay-for-Your-Vacation.jpg" alt="">
      </a>
      <span class="description">Vacation</span>
    </li>
    <li>
      <a href="#CouponsDiv" class="categoryLink" data-filter="Meal">
        <img class="heroGridImg" src="images used\FestivalGridImages\59634cb573baae2f5e3bd5e3b8a7eca4.jpg" alt="">
        <span class="description" style="padding-left: 37%;">Meals Coupons</span>
      </a>      
    </li>
    <li>
     <a href="#CouponsDiv" class="categoryLink" data-filter="Fitness">
        <img class="heroGridImg" src="images used\FestivalGridImages\gym-equiptment-getty-1220-2000-bc49cc33d38f4579b30835a3ee8e4623.jpg" alt="">
        <span class="description" style="padding-left: 35%;">Fitness</span>
     </a>   
    </li>
    <li>
      <a href="#CouponsDiv" class="categoryLink" data-filter="Luxury">
        <img class="heroGridImg" src="images used\FestivalGridImages\LuxuryProducts.jpg" alt="">
        <span class="description">Luxury Products</span>
      </a>
    </li>
    <li>
      <a href="#CouponsDiv" class="categoryLink" data-filter="Education">
        <img class="heroGridImg" src="images used\FestivalGridImages\Types-of-Education.jpg" alt="">
        <span class="description">Education</span>
      </a>
    </li>
</ul>
</div>


<!-- Carousel Section -->

<div class="carouselHeadingDiv">
    <p class="carouselHeadingLine"> Brands We are Tied up with </p>
</div>

<div id="slidy-container">
    <figure id="slidy">
      <img src="images used\Logos\AffiliateBrands\1 (2).jpg" class="carouselImg" style="margin-top: 35px;">
      <img src="images used\Logos\AffiliateBrands\1 (68).png" class="carouselImg">
      <img src="images used\Logos\AffiliateBrands\Starbucks.png" class="carouselImg" style="margin-top: 18x;" >
      <img src="images used\Logos\AffiliateBrands\CalvinKlein.png" class="carouselImg" style="margin-top: 60px;" >
      <img src="images used\Logos\AffiliateBrands\Dominos.png" class="carouselImg" style="margin-top: 10px;" >
      <img src="images used\Logos\AffiliateBrands\Levis.png" class="carouselImg" style="margin-top: 60px;" >
      <img src="images used\Logos\AffiliateBrands\1 (55).png" class="carouselImg" style="margin-top: 70px;" >
      <img src="images used\Logos\AffiliateBrands\1 (46).png" class="carouselImg" style="margin-top: 10px;" >
      <img src="images used\Logos\AffiliateBrands\1 (45).png" class="carouselImg" style="margin-top: 70px;" >
      <img src="images used\Logos\AffiliateBrands\1 (43).png" class="carouselImg" style="margin-top: 45px;" >
      <img src="images used\Logos\AffiliateBrands\1 (19).png" class="carouselImg" style="margin-top: 65px;" >
      <img src="images used\Logos\AffiliateBrands\LouisVuitton.png" class="carouselImg" style="margin-top: 35px;" >
      <img src="images used\Logos\AffiliateBrands\1 (58).png" class="carouselImg" style="margin-top: 35px;" >
      <img src="images used\Logos\AffiliateBrands\1 (60).png" class="carouselImg" style="margin-top: 75px;" >
      <img src="images used\Logos\AffiliateBrands\1 (6).png" class="carouselImg" style="margin-top: 45px;" >
      <img src="images used\Logos\AffiliateBrands\Robin.png" class="carouselImg" style="margin-top: 25px;" >
      <img src="images used\Logos\AffiliateBrands\1 (3).png" class="carouselImg" style="margin-top: 65px;" >
      <img src="images used\Logos\AffiliateBrands\Netflix.png" class="carouselImg" style="margin-top: 68px;" >
      <img src="images used\Logos\AffiliateBrands\1 (100).png" class="carouselImg" style="margin-top: 75px;" >
      <img src="images used\Logos\AffiliateBrands\1 (107).png" class="carouselImg" style="margin-top: 55px;" >
    </figure>
  </div>

<script>
    /* user defined variables */
var timeOnSlide = 3, 		
    // the time each image will remain static on the screen, measured in seconds
timeBetweenSlides = 1, 	
    // the time taken to transition between images, measured in seconds

// test if the browser supports animation, and if it needs a vendor prefix to do so
    animationstring = 'animation',
    animation = false,
    keyframeprefix = '',
    domPrefixes = 'Webkit Moz O Khtml'.split(' '), 
    // array of possible vendor prefixes
    pfx  = '',
    slidy = document.getElementById("slidy"); 
if (slidy.style.animationName !== undefined) { animation = true; } 
// browser supports keyframe animation w/o prefixes

if( animation === false ) {
  for( var i = 0; i < domPrefixes.length; i++ ) {
    if( slidy.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
      pfx = domPrefixes[ i ];
      animationstring = pfx + 'Animation';
      keyframeprefix = '-' + pfx.toLowerCase() + '-';
      animation = true;
      break;
    }
  }
}

if( animation === false ) {
  // animate in JavaScript fallback
} else {
  var images = slidy.getElementsByTagName("img"),
      firstImg = images[0], 
      // get the first image inside the "slidy" element.
      imgWrap = firstImg.cloneNode(false);  // copy it.
  slidy.appendChild(imgWrap); // add the clone to the end of the images
  var imgCount = images.length, // count the number of images in the slide, including the new cloned element
      totalTime = (timeOnSlide + timeBetweenSlides) * (imgCount - 6), // calculate the total length of the animation by multiplying the number of _actual_ images by the amount of time for both static display of each image and motion between them
      slideRatio = (timeOnSlide / totalTime)*100, // determine the percentage of time an induvidual image is held static during the animation
      moveRatio = (timeBetweenSlides / totalTime)*100, // determine the percentage of time for an individual movement
      basePercentage = 100/imgCount, // work out how wide each image should be in the slidy, as a percentage.
      position = 0, // set the initial position of the slidy element
      css = document.createElement("style"); // start marking a new style sheet
  css.type = "text/css";
  css.innerHTML += "#slidy { text-align: left; margin: 0; font-size: 0; position: relative; width: " + (imgCount * 100) + "%;  }\n"; // set the width for the slidy container
  css.innerHTML += "#slidy img { float: left; width: 150px; }\n";
  css.innerHTML += "@"+keyframeprefix+"keyframes slidy {\n"; 
  for (i=0;i<(imgCount-1); i++) 
  { 
    position += slideRatio; 
    css.innerHTML += position+"% { left: -"+(i * 160)+"px; }\n";
    position += moveRatio; 
    css.innerHTML += position+"% { left: -((i+1) * 100)px; }\n";
  }
  css.innerHTML += "}\n";
  css.innerHTML += "#slidy { left: 0%; "+keyframeprefix+"transform: translate3d(0,0,0); "+keyframeprefix+"animation: "+totalTime+"s slidy infinite; }\n"; // call on the completed keyframe animation sequence
document.body.appendChild(css); // add the new stylesheet to the end of the document
}
</script>


<hr id="targetShop">
<!-- Products Heading -->

<div class="productsHeadingDiv" id="shopDiv">
    <p class="productHeadingLine"> Shop </p>
    <div class="categoriesFilter">
      <p class="line" id="filterAll" onclick="filterProducts('All')">All</p>
      <p class="line" id="filterLuxury" onclick="filterProducts('Luxury')">Luxury</p>
      <p class="line" id="filterClothing" onclick="filterProducts('Clothing')">Clothing</p>
      <p class="line" id="filterEducation" onclick="filterProducts('Education')">Education</p>
      <p class="line" id="filterElectronics" onclick="filterProducts('Electronics')">Electronics</p>
      <p class="line" id="filterFitness" onclick="filterProducts('Fitness')">Fitness</p>
      <p class="line" id="filterVacation" onclick="filterProducts('Vacation')">Vacation</p>
      <p class="line" id="filterMedical" onclick="filterProducts('Medical')">Medical</p>
      <p class="line" id="filterFood" onclick="filterProducts('Food')">Food</p>
    </div>
</div>
<script>
function filterProducts(category) {
    // Send an AJAX request to product_display.php with the selected category
    fetch('product_display.php?filter=' + encodeURIComponent(category))
        .then(response => response.text())
        .then(data => {
            // Update the product list with the filtered results
            const productList = document.getElementById('productList');
            productList.innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
</script>

<script>
      // // JavaScript
      // document.addEventListener("DOMContentLoaded", function () {
      //   // Get all filter elements
      //   const filterElements = document.querySelectorAll(".line");

      //   // Add a click event listener to each filter element
      //   filterElements.forEach(function (element) {
      //       element.addEventListener("click", function () {
      //           // Get the selected category
      //           const filterCategory = element.textContent.trim();

      //           // Send an AJAX request to the PHP script with the selected filter
      //           const xhr = new XMLHttpRequest();
      //           xhr.open("GET", "product_display.php?filter=" + encodeURIComponent(filterCategory), true);
      //           xhr.onreadystatechange = function () {
      //               if (xhr.readyState === 4 && xhr.status === 200) {
      //                   // Update the product list with the filtered results
      //                   const productList = document.getElementById("productList");
      //                   productList.innerHTML = xhr.responseText;
      //               }
      //           };
      //           xhr.send();
      //       });
      //   });

        
        // Trigger a click event on the "All" filter by default
        document.getElementById("filterAll").click();

        // Check if the anchor elements exist before adding the event listeners
        const couponsLinks = document.querySelectorAll('a[href="#CouponsDiv"]');
        if (couponsLinks) {
          couponsLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
              e.preventDefault();
              const targetDiv = document.getElementById('shopDiv');
              if (targetDiv) {
                console.log('shopDiv found'); // Moved this line inside the targetDiv check
                targetDiv.scrollIntoView({
                  top: targetDiv.offsetTop,
                  behavior: "smooth",
                  inline: 'nearest'
                });

                const filterCategory = link.getAttribute("data-filter"); // Use 'link' instead of 'couponsLinks'
                const filterElement = document.getElementById(`filter${filterCategory}`);
                if (filterElement) {
                  filterElement.click();
                }
              } else {
                console.log('shopDiv not found');
              }
            });
          });
        }

        // function to get id from product div and give it to php to add to cart
        function retrieveParentId(linkElement) {
          // Find the closest parent with class 'Prod'
          var parentDiv = linkElement.closest('.Prod');

          if (parentDiv) {
              var parentId = parentDiv.id;

              // Send an AJAX request to the PHP script to execute it
              var xhr = new XMLHttpRequest();
              xhr.open("GET", "addtocart_master.php?id=" + parentId, true);
              xhr.onreadystatechange = function () {
                  if (xhr.readyState == 4) {
                      if (xhr.status == 200) {
                      } else {
                          alert('An error occurred while making the request.');
                      }
                  }
              };
              xhr.send();
            location.reload();
          }
      }

    // });

</script>


<!-- Products -->

<div class="productsGridContainer" id="productList">
  <?php include('product_display.php') ?>
</div>

<?php include('footer.php') ?>

</body>
</html>

