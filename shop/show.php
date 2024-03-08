<?php
include "../header/nav_cus.php";
?>
<html>

<head>
    <title>ThaiCreate.Com</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/show.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <div class="title">
        <h1>Cart</h1>
    </div>

    <?php if (isset($_GET['id'])) {
        $p_id = $_GET['id'];
        $act = $_GET['action'];




        // if($p_id == 0){
        //   echo "<div class='empty'> Ops...Your card is empty</div>";
        // }


        if ($act == 'add' && !empty($p_id)) {
            if (isset($_SESSION['cart'][$p_id])) {
                $_SESSION['cart'][$p_id]++; //post increment  $session[][idที่ add มา] => array (จำนวนที่เรากดใส่ตะกร้า)
            } else {
                $_SESSION['cart'][$p_id] = 1; //จำนวนเริ่มต้นของตะกร้า
            }
        }
        if ($act == 'decrement' && !empty($p_id)) {
            if (isset($_SESSION['cart'][$p_id])) {
                $_SESSION['cart'][$p_id]--;
            }
            if ($_SESSION['cart'][$p_id] < 1) { //
                unset($_SESSION['cart'][$p_id]);
                header("location:show.php?id=0&action=non");
            }
        }

        if ($act == 'remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
        {
            unset($_SESSION['cart'][$p_id]);
        }
    }

    ?>
 <form action="confirm_cart.php?id=<?php echo $_SESSION['customer_id']; ?>" method="post">
    <div class="product">
        <ul>
            <?php
            if (!empty($_SESSION['cart'])) {
                $total = 0;
                foreach ($_SESSION['cart'] as $p_id => $qty) {
                    $query = "SELECT * FROM product WHERE product_id = $p_id";
                    $result = mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($result);

                    // Calculate the total price for this item
                    $sum = $row['product_price'] * $qty;
                    $total += $sum;
                    ?>
                    <li>
                        <?php echo $row['product_name'] ?>
                        <?php echo number_format($sum, 2) ?> ฿
                        <div class="Decrements">
                            <a href="show.php?id=<?php echo $p_id ?>&action=decrement">-</a>
                        </div>
                        <div class="qty"><?php echo $qty ?></div>
                        <div class="Increments">
                            <a href="show.php?id=<?php echo $p_id ?>&action=add">+</a>
                        </div>
                        <div class="remove">
                            <a href='show.php?id=<?php echo $p_id ?>&action=remove'>Remove</a>
                        </div>
                    </li>
                    <?php
                } // End of foreach loop

                ?>
               
            <?php
            } else {
                echo "<div class='empty'> Ops...Your cart is empty!</div>";
            }
            ?>
        </ul>
        
      
    </div>
    <input type="submit" value="Checkout" name="checkout">
    <li>Total: <?php echo number_format($total, 2) ?> ฿</li>
</form>





    </form>





</body>

</html>