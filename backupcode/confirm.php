<?php require "header_index.php";

if(empty($_SESSION['cart'])){
  header('Location:cart.php?id=0&action=non');
  
}
else{

 ?>
<html>
    <head>
        <title>Confirm order</title>
        <link rel="stylesheet" href="css/confirm.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Space+Grotesk:wght@300;400&display=swap" rel="stylesheet">
    </head>
    <form action="saveorder.php" method="post">
    <body>
      <div class="main">
        <div class="box">
            <h1>My shopping cart</h1>
            <?php $total = 0;
            foreach($_SESSION['cart'] as $p_id=>$qty){
                  $sql = "SELECT * from product as p join image on image.product_id = p.id where p.id=$p_id";
                  $query = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($query);
                    $sum = $row['product_price'] * $qty;
                    $total += $sum;
            ?>
            <div class="product">
                <div class="img"><img src="image/<?php  echo $row['img'];?>" alt=""></div>
                        <div class="name"><?php  echo $row['product_name'];?></div>
                        <div class="price"><?php  echo number_format($row['product_price'],2);?>฿</div>
                        <div class="qty"><?php  echo $qty;?></div>
            </div> 
            <?php }
        ?>             
            <div class="payment">
                <div class="total">
                    <div class="total-price">Total</div> <div class="number-price"><?php  echo number_format($total,2);?> ฿</div>

                </div>
                <p>Email</p>
                <div class="email"> <input type="text" placeholder=" Email" name="email"></div>
                   <p>Address</p>
                <div class="address"> <input type="text" placeholder=" Address" name="address"></div>
                <p>Phone</p>
                <div class="phone"> <input type="text" placeholder=" Phone-number" name="phone"></div> 
                <input type="submit" value="Pay">
                <div class="paypal"> <a href="https://www.paypal.com/th/signin?locale.x=en_TH"><img src="image/paypal.png" alt=""></a></div>
                <input type="hidden" name="total" value="<?php echo $total ?>">
               


            </div>
                
        </div>
        </div>
    </body>
</form>
</html>
<?php }?>