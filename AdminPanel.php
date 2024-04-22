<!DOCTYPE html>
<html lang="en">
<head>
<title>AdminPanel</title>
<meta charset="UTF-8">
<meta class="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="Index.css">
<link rel="stylesheet" type="text/css" href="AdminPanelCss.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="adminPanelHeading">
  <div class="adminPanelHeadingDiv">
    <div>
      <button onclick="redirectToHomePage()">Home</button>
    </div>
    <p>Admin Panel</p>
  </div>
</div>

<script>
  function redirectToHomePage() {
    window.location.href = "http://localhost/project-pushkar/Index.php";
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

<div class="adminPanelContainer">
<?php
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

// Retrieve brand options from the brand table
$brandQuery = "SELECT brand FROM brand";
$brandResult = $conn->query($brandQuery);
?>

<!-- Adding a Product -->
<div class="addAProduct">
<form action="adminphp.php" method="POST">
<header><h2>Add a Product</h2></header>

<div>
<label for="brandOfNewProduct">Brand of the Coupon</label>
<div>
<select id="brandOfNewProduct" name="brand" required style="border-top: 1px solid #ccc;border-left: 1px solid #ccc;border-right: 1px solid #eee;border-bottom: 1px solid #eee;border-radius: 7.5px;background-color: #d8eafba3;padding: 5px 5px 5px 15px;">
<option value="">Select brand</option>
<?php
// Populate brand options
while ($row = $brandResult->fetch_assoc()) {
echo "<option value='" . $row["brand"] . "'>" . $row["brand"] . "</option>";
}
?>
</select>
</div>
</div>

<div>
<label for="category">Category</label>
<div>
<select id="category" name="category" required style="border-top: 1px solid #ccc;border-left: 1px solid #ccc;border-right: 1px solid #eee;border-bottom: 1px solid #eee;border-radius: 7.5px;background-color: #d8eafba3;padding: 5px 5px 5px 15px;">
<option value="">Select Category</option>
<?php
// Populate category options
$categoryQuery = "SELECT category_name FROM category";
$categoryResult = $conn->query($categoryQuery);
while ($row = $categoryResult->fetch_assoc()) {
echo "<option value='" . $row["category_name"] . "'>" . $row["category_name"] . "</option>";
}
?>
</select>
</div>
</div>

<div>
<label for="sellingPriceOfNewProduct">Price of the Pack</label>
<div>
<input id="sellingPriceOfNewProduct" class="sellingPriceOfNewProduct" name="price" placeholder="₹ " type="number" tabindex="8" min="1"> 
</div>
</div>

<div>
<label for="quantity">Pack of</label>
<div>
<input id="packOfNewProduct" type="number" tabindex="8" min="1" name="quantity" required>
</div>
</div>

<div>
<label for="descriptionOfNewProduct">Description of the New Product</label>
<div>
<textarea id="descriptionOfNewProduct" spellcheck="true" rows="2" cols="20" tabindex="9" name="coupon_desc"></textarea>
</div>
</div>

<div>
<label for="costsellingPriceOfNewProduct">Cost Price</label>
<div>
<input id="costsellingPriceOfNewProduct" class="costsellingPriceOfNewProduct" placeholder="₹ " type="number" min="1" tabindex="7" name="costsellingPriceOfNewProduct"> 
</div>
</div>

<div>
<label for="expiryOfNewProduct">Expiry Date</label>
<div>
<input id="expiryOfNewProduct" type="date" tabindex="7" name="expiry" required>
</div>
</div>

<div>
<div class="save-clearForm" style="margin-top: 45px;">
<input id="saveForm" type="submit" value="Submit" tabindex="10">
<input id="clearForm" type="reset" value="Clear" tabindex="11">
</div>
</div>
</form>
</div>


<?php
// Close the database connection
$conn->close();
?>


<?php
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

// Retrieve brand options from the brand table
$brandQuery = "SELECT brand FROM brand";
$brandResult = $conn->query($brandQuery);
?>
<!-- Deleting a Product -->
<div class="deleteAProduct mainLayoutDiv">
<form action="#" method="POST">
<header><h2>Delete a Product</h2></header>

<div>
<label for="brandOfNewProduct">Brand of the Coupon</label>
<div>
<select id="brandOfNewProduct" name="supplier" required style="border-top: 1px solid #ccc;border-left: 1px solid #ccc;border-right: 1px solid #eee;border-bottom: 1px solid #eee;border-radius: 7.5px;background-color: #d8eafba3;padding: 5px 5px 5px 15px;">
<option value="">Select brand</option>
<?php
// Populate brand options
while ($row = $brandResult->fetch_assoc()) {
echo "<option value='" . $row["brand"] . "'>" . $row["brand"] . "</option>";
}
?>
</select>
</div>
</div>

<div>
<label for="category">Category</label>
<div>
<select id="category" name="category" required style="border-top: 1px solid #ccc;border-left: 1px solid #ccc;border-right: 1px solid #eee;border-bottom: 1px solid #eee;border-radius: 7.5px;background-color: #d8eafba3;padding: 5px 5px 5px 15px;">
<option value="">Select Category</option>
<?php
// Populate category options
$categoryQuery = "SELECT category_name FROM category";
$categoryResult = $conn->query($categoryQuery);
while ($row = $categoryResult->fetch_assoc()) {
echo "<option value='" . $row["category_name"] . "'>" . $row["category_name"] . "</option>";
}
?>
</select>
</div>
</div>

<div>
<label for="sellingPriceOfNewProduct">Price of the Pack</label>
<div>
<input id="sellingPriceOfNewProduct" class="sellingPriceOfNewProduct" name="sellingPriceOfNewProduct" placeholder="₹ " type="number" tabindex="8" min="1"> 
</div>
</div>

<div>
<label for="descriptionOfNewProduct">Description of the New Product</label>
<div>
<textarea id="descriptionOfNewProduct" spellcheck="true" rows="2" cols="20" tabindex="9" name="coupon_desc"></textarea>
</div>
</div>

<div>
<div class="save-clearForm">
<input id="saveForm" class="saveForm" type="submit" value="Submit" tabindex="10">
<input id="clearForm" class="clearForm" type="reset" value="Clear" tabindex="11">
</div>
</div>
</form>
</div>

<?php
// Close the database connection
$conn->close();
?>









<div class="revenueGenerated mainLayoutDiv">

<div class="chart-container">
    <script type="text/javascript" src="AmChart.js"></script>
    <script type="text/javascript" src="Serial.js"></script>
    <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>

    <script>
        function hideOthers(e) {
            var currentGraph = e.dataItem;
            var hidden = true;
            //check if we clicked on this graph before and if all the other graphs are visible.
            // if we clicked on this graph before and the other graphs are invisible,
            // make them visible, otherwise default to previous behavior
            if (e.chart.lastClicked == currentGraph.id && e.chart.allVisible == false) {
                hidden = false;
                e.chart.allVisible = true;
            }
            else {
                e.chart.allVisible = false;
            }
            e.chart.lastClicked = currentGraph.id; //keep track of the current one we clicked

            currentGraph.hidden = false; //force clicked graph to stay visible
            e.chart.graphs.forEach(function (graph) {
                if (graph.id !== currentGraph.id) {
                    graph.hidden = hidden; //set the other graph's visibility based on the rules above
                }
            });
            // update the chart with newly set hidden values
            e.chart.validateNow();
        }

        AmCharts.makeChart("chartdiv", {
            "type": "serial",
            "theme": "dark",
            "lastClicked": null,
            "allVisible": true, //if you're only showing one graph by default, set this to false
            "categoryField": "category",
            "startDuration": 1,
            "categoryAxis": {
                "gridPosition": "start",
                "labels": {
                    "rotation": 45, // Rotate the labels for better readability
                },
            },
            "trendLines": [],
            "graphs": [{
                "balloonText": "[[title]] of [[category]]:[[value]]",
                "bullet": "round",
                "id": "AmGraph-1",
                "title": "Sales", // Change the Y-axis title to "Sales"
                "valueField": "column-1" // Change the valueField accordingly
            }],
            "guides": [],
            "valueAxes": [{
                "id": "ValueAxis-1",
                "stackType": "regular",
                "title": "Axis title"
            }],
            "allLabels": [],
            "balloon": {},
            "legend": {
                "enabled": true,
                "useGraphSettings": true,
                "listeners": [{
                    "event": "showItem",
                    "method": hideOthers
                }, {
                    "event": "hideItem",
                    "method": hideOthers
                }]
            },
            "titles": [{
                "id": "Title-1",
                "size": 15,
                "text": "Chart Title"
            }],
            "dataProvider": [{
                "category": "Luxury", // Change the category labels
                "column-1": <?php
                                  $host = "localhost"; // Your database host
                                  $username = "root"; // Your database username
                                  $password = ""; // Your database password
                                  $database = "coupon_store"; // Your database name

                                  // Create a connection
                                  $conn = new mysqli($host, $username, $password, $database);

                                  // Check connection
                                  if ($conn->connect_error) {
                                      die("Connection failed: " . $conn->connect_error);
                                  }

                                  // Define the category for which you want to count coupons
                                  $category = "Luxury";

                                  // Query to count coupons in the "receipt_master" table for the specified category
                                  $query = "SELECT COUNT(r.Coupon_id) AS coupon_count
                                            FROM receipt_master r
                                            INNER JOIN coupon c ON r.Coupon_id = c.Coupon_id
                                            WHERE c.category = '$category'";

                                  $result = $conn->query($query);

                                  if ($result) {
                                      // Fetch the result row
                                      $row = $result->fetch_assoc();
                                      $couponCount = $row['coupon_count'];

                                      // Output the coupon count for the "Luxury" category
                                      echo $couponCount;
                                  } else {
                                      echo "Error executing query: " . $conn->error;
                                  }

                                  // Close the database connection
                                  $conn->close();
                                  ?>

            },
            {
                "category": "Education",
                "column-1": <?php
                                    $host = "localhost"; // Your database host
                                    $username = "root"; // Your database username
                                    $password = ""; // Your database password
                                    $database = "coupon_store"; // Your database name

                                    // Create a connection
                                    $conn = new mysqli($host, $username, $password, $database);

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Define the category for which you want to count coupons
                                    $category = "Education";

                                    // Query to count coupons in the "receipt_master" table for the specified category
                                    $query = "SELECT COUNT(r.Coupon_id) AS coupon_count
                                              FROM receipt_master r
                                              INNER JOIN coupon c ON r.Coupon_id = c.Coupon_id
                                              WHERE c.category = '$category'";

                                    $result = $conn->query($query);

                                    if ($result) {
                                        // Fetch the result row
                                        $row = $result->fetch_assoc();
                                        $couponCount = $row['coupon_count'];

                                        // Output the coupon count for the "Luxury" category
                                        echo $couponCount;
                                    } else {
                                        echo "Error executing query: " . $conn->error;
                                    }

                                    // Close the database connection
                                    $conn->close();
                                ?>

            },
            {
                "category": "Electronics",
                "column-1": <?php
                                      $host = "localhost"; // Your database host
                                      $username = "root"; // Your database username
                                      $password = ""; // Your database password
                                      $database = "coupon_store"; // Your database name

                                      // Create a connection
                                      $conn = new mysqli($host, $username, $password, $database);

                                      // Check connection
                                      if ($conn->connect_error) {
                                          die("Connection failed: " . $conn->connect_error);
                                      }

                                      // Define the category for which you want to count coupons
                                      $category = "Electronics";

                                      // Query to count coupons in the "receipt_master" table for the specified category
                                      $query = "SELECT COUNT(r.Coupon_id) AS coupon_count
                                                FROM receipt_master r
                                                INNER JOIN coupon c ON r.Coupon_id = c.Coupon_id
                                                WHERE c.category = '$category'";

                                      $result = $conn->query($query);

                                      if ($result) {
                                          // Fetch the result row
                                          $row = $result->fetch_assoc();
                                          $couponCount = $row['coupon_count'];

                                          // Output the coupon count for the "Luxury" category
                                          echo $couponCount;
                                      } else {
                                          echo "Error executing query: " . $conn->error;
                                      }

                                      // Close the database connection
                                      $conn->close();
                                      ?>

            },
            {
                "category": "Fitness",
                "column-1": <?php
                              $host = "localhost"; // Your database host
                              $username = "root"; // Your database username
                              $password = ""; // Your database password
                              $database = "coupon_store"; // Your database name

                              // Create a connection
                              $conn = new mysqli($host, $username, $password, $database);

                              // Check connection
                              if ($conn->connect_error) {
                                  die("Connection failed: " . $conn->connect_error);
                              }

                              // Define the category for which you want to count coupons
                              $category = "Fitness";

                              // Query to count coupons in the "receipt_master" table for the specified category
                              $query = "SELECT COUNT(r.Coupon_id) AS coupon_count
                                        FROM receipt_master r
                                        INNER JOIN coupon c ON r.Coupon_id = c.Coupon_id
                                        WHERE c.category = '$category'";

                              $result = $conn->query($query);

                              if ($result) {
                                  // Fetch the result row
                                  $row = $result->fetch_assoc();
                                  $couponCount = $row['coupon_count'];

                                  // Output the coupon count for the "Luxury" category
                                  echo $couponCount;
                              } else {
                                  echo "Error executing query: " . $conn->error;
                              }

                              // Close the database connection
                              $conn->close();
                              ?>

            },
            {
                "category": "Food",
                "column-1": <?php
                          $host = "localhost"; // Your database host
                          $username = "root"; // Your database username
                          $password = ""; // Your database password
                          $database = "coupon_store"; // Your database name

                          // Create a connection
                          $conn = new mysqli($host, $username, $password, $database);

                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          }

                          // Define the category for which you want to count coupons
                          $category = "Food";

                          // Query to count coupons in the "receipt_master" table for the specified category
                          $query = "SELECT COUNT(r.Coupon_id) AS coupon_count
                                    FROM receipt_master r
                                    INNER JOIN coupon c ON r.Coupon_id = c.Coupon_id
                                    WHERE c.category = '$category'";

                          $result = $conn->query($query);

                          if ($result) {
                              // Fetch the result row
                              $row = $result->fetch_assoc();
                              $couponCount = $row['coupon_count'];

                              // Output the coupon count for the "Luxury" category
                              echo $couponCount;
                          } else {
                              echo "Error executing query: " . $conn->error;
                          }

                          // Close the database connection
                          $conn->close();
                          ?>

            },
            {
                "category": "Clothing",
                "column-1": <?php
                                $host = "localhost"; // Your database host
                                $username = "root"; // Your database username
                                $password = ""; // Your database password
                                $database = "coupon_store"; // Your database name

                                // Create a connection
                                $conn = new mysqli($host, $username, $password, $database);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Define the category for which you want to count coupons
                                $category = "Clothing";

                                // Query to count coupons in the "receipt_master" table for the specified category
                                $query = "SELECT COUNT(r.Coupon_id) AS coupon_count
                                          FROM receipt_master r
                                          INNER JOIN coupon c ON r.Coupon_id = c.Coupon_id
                                          WHERE c.category = '$category'";

                                $result = $conn->query($query);

                                if ($result) {
                                    // Fetch the result row
                                    $row = $result->fetch_assoc();
                                    $couponCount = $row['coupon_count'];

                                    // Output the coupon count for the "Luxury" category
                                    echo $couponCount;
                                } else {
                                    echo "Error executing query: " . $conn->error;
                                }

                                // Close the database connection
                                $conn->close();
                                ?>

            },
            {
                "category": "Vacation",
                "column-1": <?php
                                $host = "localhost"; // Your database host
                                $username = "root"; // Your database username
                                $password = ""; // Your database password
                                $database = "coupon_store"; // Your database name

                                // Create a connection
                                $conn = new mysqli($host, $username, $password, $database);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Define the category for which you want to count coupons
                                $category = "Vacation";

                                // Query to count coupons in the "receipt_master" table for the specified category
                                $query = "SELECT COUNT(r.Coupon_id) AS coupon_count
                                          FROM receipt_master r
                                          INNER JOIN coupon c ON r.Coupon_id = c.Coupon_id
                                          WHERE c.category = '$category'";

                                $result = $conn->query($query);

                                if ($result) {
                                    // Fetch the result row
                                    $row = $result->fetch_assoc();
                                    $couponCount = $row['coupon_count'];

                                    // Output the coupon count for the "Luxury" category
                                    echo $couponCount;
                                } else {
                                    echo "Error executing query: " . $conn->error;
                                }

                                // Close the database connection
                                $conn->close();
                                ?>

            },
            {
                "category": "Medical",
                "column-1": <?php
                              $host = "localhost"; // Your database host
                              $username = "root"; // Your database username
                              $password = ""; // Your database password
                              $database = "coupon_store"; // Your database name

                              // Create a connection
                              $conn = new mysqli($host, $username, $password, $database);

                              // Check connection
                              if ($conn->connect_error) {
                                  die("Connection failed: " . $conn->connect_error);
                              }

                              // Define the category for which you want to count coupons
                              $category = "Medical";

                              // Query to count coupons in the "receipt_master" table for the specified category
                              $query = "SELECT COUNT(r.Coupon_id) AS coupon_count
                                        FROM receipt_master r
                                        INNER JOIN coupon c ON r.Coupon_id = c.Coupon_id
                                        WHERE c.category = '$category'";

                              $result = $conn->query($query);

                              if ($result) {
                                  // Fetch the result row
                                  $row = $result->fetch_assoc();
                                  $couponCount = $row['coupon_count'];

                                  // Output the coupon count for the "Luxury" category
                                  echo $couponCount;
                              } else {
                                  echo "Error executing query: " . $conn->error;
                              }

                              // Close the database connection
                              $conn->close();
                              ?>

            }
            ]
        });

    </script>
</div>






<div class="countersAndCircles">

<?php
          // Database connection parameters
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "coupon_store";

          // Create a database connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check the connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // SQL query to calculate total revenue
          $totalRevenueQuery = "SELECT SUM(c.price) AS totalRevenue
                                FROM receipt_master AS r
                                JOIN coupon AS c ON r.Coupon_id = c.Coupon_id";

          $result = $conn->query($totalRevenueQuery);
          if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $totalRevenue = $row["totalRevenue"];
          } else {
              $totalRevenue = 0;
          }

          // SQL query to calculate revenue for each category and their percentages
          $categoryRevenueQuery = "SELECT c.category, SUM(c.price) AS categoryRevenue,
                                  (SUM(c.price) / $totalRevenue * 100) AS revenuePercentage
                                  FROM receipt_master AS r
                                  JOIN coupon AS c ON r.Coupon_id = c.Coupon_id
                                  GROUP BY c.category
                                  ORDER BY revenuePercentage DESC
                                  LIMIT 3";

          $categoryResult = $conn->query($categoryRevenueQuery);

          // Close the database connection
          $conn->close();
              $counterClasses = ['Counter1', 'Counter2', 'Counter3'];
              $counterIndex = 0;

               
                        
                      while ($row = $categoryResult->fetch_assoc()) {
                        $counterClass = $counterClasses[$counterIndex];
                        echo '<div class="' . $counterClass . '">';
                        echo '<div class="radial-graph">';
                        echo '<div class="shape">';
                        echo '<div class="mask full-mask">';
                        echo '<div class="fill" style="transform: rotate(' . $row["revenuePercentage"] . 'deg);"></div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="cutout">';
                        echo '<span class="actualPercentageValue">' . number_format($row["revenuePercentage"], 2) . '%</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div><span>' . $row["category"] . '</span></div>';
                        echo '</div>';
                        

                        // Increment the counter index
                        $counterIndex++;
                    }
              ?>
    </div>
</div>


<!-- Products + User Count -->
<div class="productsSold mainLayoutDiv">
<div class="productsSoldsubDiv productsSold-container">
<div class="counter">
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "coupon_store";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve the number of rows in the 'receipt_master' table
$query = "SELECT COUNT(*) AS row_count FROM receipt_master";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $row_count = $row['row_count'];

    // Close the database connection
    $conn->close();
    
    // Print the row count inside the <span> tag
    echo '<span data-target="' . $row_count . '" class="count">' . $row_count . '</span>';
} else {
    echo "Error: " . $conn->error;
}
?>

</div><br>
<span>Products Sold</span>
</div>
              <?php
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

              // Query to count the number of rows in the "customer" table.
              $countQuery = "SELECT COUNT(*) AS rowCount FROM customer";

              $result = mysqli_query($conn, $countQuery);

              if (!$result) {
                  die("Error: " . mysqli_error($conn));
              }

              $row = mysqli_fetch_assoc($result);
              $rowCount = $row["rowCount"];

              // Close the database connection
              mysqli_close($conn);
              ?>

              <!-- HTML structure with the data-target attribute -->
              <div class="productsSoldsubDiv activeCustomers-container">
                  <div class="counter">
                      <span data-target="<?php echo $rowCount; ?>" class="count"><?php echo $rowCount; ?></span>
                  </div>
                  <span>Active <br> Customers-Enterprises</span>
              </div>


</div>

<script>
const counters = document.querySelectorAll('.count');
const speed = 200;

counters.forEach((counter) => {
const updateCount = () => {
  const target = parseInt(counter.getAttribute('data-target'));
  const count = parseInt(counter.innerText);
  const increment = Math.trunc(target / speed);
  
  if (count < target) {
    counter.innerText = count + increment;
    setTimeout(updateCount, 1);
  } else {
    counter.innerText = target;
  }
};
updateCount();
});
</script>



<div class="dropDownForCountOfStuff mainLayoutDiv">



<div class="dropDownForCountOfStuff mainLayoutDiv">
<form id="countForm">
<select name="Countof_stuff">
<option value="no">Select  option</option>
<option value="CountBrands">Count of brands associated with us</option>
<option value="CountCategories">Count of Categories listed on website</option>
<option value="CountCoupon">Count of Coupon listed in our website</option>
</select>
<button type="submit">Search</button>
</form>

<div class="resultDiv"> </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("countForm");
    const resultDiv = document.querySelector(".resultDiv");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const selectedOption = form.querySelector("select[name='Countof_stuff']").value;

        if (selectedOption === "no") {
            // If "Select option" is chosen, do nothing.
            resultDiv.innerHTML = "";
            return;
        }

        // Make an AJAX request to the PHP script based on the selected option.
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "count.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Display the result in the resultDiv.
                resultDiv.innerHTML = xhr.responseText;
            }
        };

        // Send the selected option as a parameter to the PHP script.
        xhr.send(`option=${selectedOption}`);
    });
});

</script>
</div></div>


<div class="addABrand mainLayoutDiv">

<form action="addBrand.php" method="POST">
<header><h2>Add a Brand</h2></header>    

<div>
<label class="nameOfNewBrand" for="nameOfNewBrand">Brand Name</label>
<div>
<input id="nameOfNewBrand" name="nameOfNewBrand" type="text" class="nameOfNewBrand" value="" tabindex="1">
</div>
</div>  
<div>
<label for="numberOfNewBrand">Contact Number</label>
<div>
<input name="numberOfNewBrand" id="numberOfNewBrand" class="numberOfNewBrand" type="tel" tabindex="7" placeholder="+91" pattern="[0-9]{10}" required> 
</div>
</div>
<div>
<label for="emailOfNewBrand">Email</label>
<div>
<input id="emailOfNewBrand" class="emailOfNewBrand" name="emailOfNewBrand" type="email" > 
</div>
</div>
<div>
<div class="save-clearForm">
<input id="saveForm" class="saveForm" type="submit" value="Submit" tabindex="10">
<input id="clearForm" class="clearForm" type="reset" value="Clear" tabindex="11">
</div>
</div>

</form>
</div>



<div class="addCategory mainLayoutDiv">
<form action="addCategory.php" method="POST">
<header><h2>Add a Category</h2></header>
<div>   
<label for="category">Category Name</label>
<input type="text" id="category" name="category" required><br><br>
</div>
<div class="save-clearForm">
<input type="submit" value="Submit">
<input type="reset" value="Clear">
</div>
</form>
</div>


</div>



       
<!-- Table Views -->
<div class="tableView">
  <h1>Coupon Table</h1>

  <div class="tableViewContainer">
    <button id="viewCoupons">View Coupons</button>
    <button id="viewCustomers">View Customers</button>
    <button id="viewCategories">View Categories</button>
    <button id="viewBrands">View Brands</button>
  </div>
  <hr>
  <div id="tableContent"></div>
</div>

<script>
    // Function to load and display tables without AJAX
    function loadTable(tableName) {
        // Hide the previously loaded table (if any)
        $('#tableContent').hide();
        
        // Load the table using PHP include
        $('#tableContent').load(tableName + '.php', function() {
            // Show the table when it's loaded
            $('#tableContent').show();
        });
    }

    // Event listeners for table view buttons
    $('#viewCoupons').click(function () {
        loadTable('couponTable');
    });

    $('#viewCustomers').click(function () {
        loadTable('customerTable');
    });

    $('#viewCategories').click(function () {
        loadTable('categoryTable');
    });

    $('#viewBrands').click(function () {
        loadTable('brandTable');
    });
</script>



</body>
</html>