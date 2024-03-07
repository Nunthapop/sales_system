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
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Montserrat+Subrayada:wght@400;700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <form action="check_login.php" method="post">
        <div class="input">
            <h1>Employee</h1>
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