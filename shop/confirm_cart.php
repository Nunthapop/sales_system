<?php  include "../header/nav_cus.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <form action="save_orders.php" method="post">
      <div class="main">
        <div class="box">
            <h1>My shopping cart</h1>
            
            <?php $total = 0;
             print_r($_SESSION['cart']);
            foreach($_SESSION['cart'] as $p_id=>$qty){
                  $sql = "SELECT * from product where product_id =$p_id";
                  $query = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($query);
                    $sum = $row['product_price'] * $qty;
                    $total += $sum;
            ?>
            
            <div class="product">
            
                        <div class="name"><?php  echo $row['product_name'];?></div>
                        <div class="price"><?php  echo number_format($row['product_price'],2);?>฿</div>
                        <div class="qty"><?php  echo $qty;?></div>
            </div> 
            <?php }
            $_SESSION['subtotal'] =$total;
        ?>             
            
                <input type="submit">
        </div>
        </div>
        </form>
    </body>
</body>
</html>
