<?php
include_once "../config/config.php";
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Montserrat+Subrayada:wght@400;700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/nav_cus.css">
    <title>navigate bar</title>
    <style> </style>
</head>

<body>
    <div class="nav">
        <ul>
             <li> <h1>Scented Serenity</h1></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="show.php">Cart</a></li>
        </ul>
        <div class="profile"><a href=" ../login/logout_cus.php">Profile</a></div>
    </div>
 
</body>

</html>