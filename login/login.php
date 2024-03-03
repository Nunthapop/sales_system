<?php
include_once "../config/config.php";
session_start();
?>
<?php if (isset($_SESSION['plz-login'])) {
    echo $_SESSION['plz-login'];
    unset($_SESSION['plz-login']);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>
    <form action="check_login.php" method="post">
        <div class="input">
            <label class="username">USERNAME<br></label>
            <input type="text" id="username" name="username">
        </div>
        <div class="input">
            <label for="">PASSWORD<br></label>
            <input type="password" id="password" name="password">

        </div>
        <input type="submit" value="LOGIN NOW">
        <div class="forget"> Not a member yet?<a href="register.php"> Register now</a></div>

        </div>
        <a href="login_cus.php">Customer</a>
    </form>
</body>

</html>