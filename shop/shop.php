<?php
include "../header/nav_cus.php";
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/shop.css">

<head>

</head>

<body>
    <form action="check_id.php" method="post">
        <?php
        $query = "SELECT * FROM product";
        $result = mysqli_query($connect, $query); ?>
        <div class="title"> <h1>Product</h1> </div>
       
        <div class="grid">
            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="child">
                <img src="../image/<?php  echo $row['image'];?>" alt="">
                    <h1><?= $row['product_name']; ?> </h1>
                    <h3><?= $row['product_description']; ?></h3>
                    <h3>Type: <?= $row['product_type']; ?></h3>
                    <h3>Price: <?= $row['product_price']; ?></h3>
                    <a href="check_id.php?id=<?php echo $row['product_id']; ?>">Add</a>  <!-- getproductID -->
                    
                </div> <?php } ?>

        </div>
    </form>
   

</body>

</html>