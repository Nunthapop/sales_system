<?php  include "../header/nav_cus.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link rel="stylesheet" href="../css/confirm.css">
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</head>

<body>
    <form action="save_orders.php" method="post">
      <div class="main">
        <div class="box">
            <h1>Order Confirmation</h1>
            
            <?php $total = 0;
            
            foreach($_SESSION['cart'] as $p_id=>$qty){
                  $sql = "SELECT * from product where product_id =$p_id";
                  $query = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($query);
                    $sum = $row['product_price'] * $qty;
                    $total += $sum;
            ?>
            
            <div class="product">
                    <img src="../image/<?php  echo $row['image'];?>" alt="">
                        <div class="name"><?php  echo $row['product_name'];?></div>
                        <div class="qty"> X<?php  echo $qty;?></div>
                        <div class="price"><?php  echo number_format($row['product_price'],2);?>฿</div>
                        
            </div> 
            <?php }
$cus_id = $_SESSION['customers_id'];
$query1 = "SELECT * FROM customers JOIN membership ON customers.membership_id = membership.membership_id WHERE customers_id = $cus_id";
$result1 = mysqli_query($connect, $query1);
$row1 = mysqli_fetch_array($result1);
$member_discount = $row1['member_discount'];
            $discount = 10; // Assuming a fixed discount of 10

            $dis_price = 0;
            $all_discount = 0; // Variable to hold total discount
            $subtotal = $total;
            
            // Calculate discount for requirement and membership discount
            if ($subtotal >= 1200) {
                $dis_price = ($subtotal / 100) * ($discount + $member_discount);
                $all_discount = $discount + $member_discount;
                $dis_price_ten = ($subtotal / 100) * $discount;
                $dis_member = ($subtotal / 100) * $member_discount;
            } else {
                $dis_price = ($subtotal / 100) * $member_discount;
                $all_discount =  $member_discount;
                $dis_member = ($subtotal / 100) * $member_discount;
                $dis_price_ten = 0;
                
            }
        
            $total = $subtotal - $dis_price;
         
        ?> 
        
        <ul>
            <li><h2>subtotal:</h2> <h2> <?php  echo number_format($subtotal, 2) ?> ฿</h2></li> 
            <li><h2>Member discount</h2> <h2> <?php  echo number_format( $dis_member, 2) ?> ฿</h2></li>
            <li><h2>Discount</h2> <h2> <?php  echo number_format( $dis_price_ten, 2) ?> ฿</h2></li>
            <li><h2>Shipping</h2> <h2> Free฿</h2></li> 
            <li><h2>Total</h2> <h2> <?php  echo number_format($total, 2)?> ฿</h2></li> 
            
        </ul>            
        <?php $_SESSION['$total'] = $total;?>
                <div class="address"> 
                    <h2>Address for shipping</h2>
                    <input type="text" name="address"> </div>
                <input type="submit" value="Place order">
        </div>
        </div>
        </form>
    </body>

</html>
