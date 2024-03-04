<?php include "../config/config.php"; ?>
<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@200;400;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>navigate bar</title>
    <style> </style>
</head>

<body>

    <div class="nav">
        <ul>
            <li><i class="fa-solid fa-house"></i><a href="../dashboard/dashboard.php">Dashboard</a></li>
            <li><i class="fa-solid fa-boxes-stacked"></i><a href="../Product/product.php"> Product</a></li>
            <li> <i class="fa-solid fa-user-tie"></i><a href="../employee/emp.php">Employee</a></li>
            <li><i class="fa-solid fa-people-group"></i> <a href="../customer/customer.php">customer</a></li>
            <li> <i class="fa-solid fa-comment-dollar"></i><a href="../orders/orders.php">Orders</a></li>
            <!-- <li> <a href="">Invoices</a></li> -->
            <li><i class="fa-solid fa-store"></i> <a href="../shop/shop.php">Shop</a></li>
            <li> <i class="fa-solid fa-right-from-bracket"></i><a href="../login/logout.php">log out</a></li>
            <li> <?php echo $_SESSION['emp_level']; ?></li>
        </ul>

    </div>

</body>

</html>