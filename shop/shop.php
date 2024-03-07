<?php
include "../header/nav_cus.php";
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/shop.css">

<head>

</head>

<body>
    <form action="or.php" method="post">
        <?php
        $query = "SELECT * FROM product";
        $result = mysqli_query($connect, $query); ?>
        <div class="title"> <h1>Product</h1> </div>
       
        <div class="grid">
            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="child">
                    <img src=" <?= '../image/' .  $row['image']; ?>" alt="">
                    <h1><?= $row['product_name']; ?> </h1>
                    <h3><?= $row['product_description']; ?></h3>
                    <h3>Type: <?= $row['product_type']; ?></h3>
                    <input type="hidden" name="txtProductID" value="<?php echo $row["product_id"]; ?>" size="2">
                   <input type="number" min="0"   name="txtQty" value="1" size="2">
                        <input type="submit" value="Add">
                </div> <?php } ?>

        </div>
    </form>


</body>

</html>