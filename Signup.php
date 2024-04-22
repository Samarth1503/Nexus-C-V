<!DOCTYPE html>
<html lang="en">
<head>
<title>Signup</title>
<meta charset="UTF-8">
<meta class="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="Index.css">
<link rel="stylesheet" type="text/css" href="AdminPanelCss.css">
<link rel="stylesheet" type="text/css" href="LoginSignup.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>


<img class="goBackX" src="images used/close.png" onclick="goBackToHomepage()">
<script>
    function goBackToHomepage() {
        window.location.href = 'https://localhost/project-pushkar/Index.php';
    }
</script>

    <div class="LoginFormcontainer">
        <div class="LoginFormDiv">
            <h2>Signup</h2>
            <hr class="headerBottomBorder">
            <form id="registrationForm" action="Signup_backend.php" method="post"> 

                <div class="inputGroup">
                    <label for="reg-name">Name</label>
                    <input type="text" id="reg-name" name="reg-name" required>
                </div>
                <br>
                <div class="inputGroup">
                    <label for="reg-email">Email</label>
                    <input type="email" id="reg-email" name="reg-email" required>
                </div>
                <br>
                <div class="inputGroup">
                    <label for="reg-contactNumber">Contact Number</label>
                    <input type="tel" id="reg-contactNumber" name="reg-contactNumber" pattern="[0-9]*" required>
                </div>
                <br>
                <div class="inputGroup">
                    <label for="reg-password">Password</label>
                    <input type="password" id="reg-password" name="reg-password" required>
                </div>
                <br>
                <div class="inputGroup">
                    <label for="reg-confirmPassword">Confirm Password</label>
                    <input type="password" id="reg-confirmPassword" name="reg-confirmPassword" required>
                </div>
                <br>
                <div>
                    <button type="submit">Register</button>
                    <button type="reset">Clear</button>
                </div>
            </form>
        </div>

    </div>

    <script>
    const registrationForm = document.getElementById("registrationForm");
    const regPassword = document.getElementById("reg-password");
    const regConfirmPassword = document.getElementById("reg-confirmPassword");

    registrationForm.addEventListener("submit", function (event) {
    if (regPassword.value !== regConfirmPassword.value) {
        event.preventDefault();
        alert("Passwords do not match. Please try again."); }
        });
    </script>


</body>
</html>