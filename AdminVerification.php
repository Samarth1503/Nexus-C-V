<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
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
        <h2>Admin Login</h2>
        <hr class="headerBottomBorder">
        <form class="LoginForm">
            <div class="inputGroup">
                <label for="login-email">Admin ID</label>
                <input type="text" id="login-email" name="login-email" required>
            </div>
            <br>
            <div class="inputGroup">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="login-password" required>
            </div>
            <br>
            <div class="loginSubmitButton">
                <button type="submit"><a style="text-decoration: none; color:white;" href="https://localhost/project-pushkar/AdminPanel.php">Login</a></button>
            </div>
        </form>
    </div>
</div>


</body>
</html>