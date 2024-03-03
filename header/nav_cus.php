<?php
session_start();
include_once "../config/config.php";
$userQuery = "SELECT * from customers";
$result = mysqli_query($connect, $userQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@200;400;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>navigate bar</title>
    <style> </style>
</head>

<body>

    <div>
        <ul>
            <?php
            if (isset($_SESSION['username'])) {
                echo $_SESSION['cus_first_name'];
                echo '<li><a href="logout.php">Logout - </a>';
                echo "<span class='user-desc'>&nbsp;[";
                echo $_SESSION['cus_first_name']
                    . "" . $_SESSION['cus_last_name']
                    . "-Level:" . $_SESSION['membership_id'];
                echo "]</span></li>";
            } else {
                echo '<li><a href="login_cus.php">Login</a></li>';
            } ?>
        </ul>
    </div>

</body>

</html>
<?php include_once "shop.php"; ?>