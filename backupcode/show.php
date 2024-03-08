<?php
include "../header/nav_cus.php";
?>
<html>

<head>
    <title>ThaiCreate.Com</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/show.css">

</head>

<body>
    <div class="title">
        <h1>Cart</h1>
    </div>

    <?php

    if (!isset($_SESSION["intLine"])) {
        echo "Cart empty";
        exit();
    }

    ?>
    <div class="parent">
        <div class="product">
            <ul>  
                
                <?php
        $Total = 0;
        $SumTotal = 0;?>
        <li>ProductID
        <?php for ($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {
            if ($_SESSION["strProductID"][$i] != "") {
                $query = "SELECT * FROM product WHERE product_id = '" . $_SESSION["strProductID"][$i] . "' ";
                $result = mysqli_query($connect, $query);
                $objResult = mysqli_fetch_array($result);
                $Total = $_SESSION["strQty"][$i] * $objResult["product_price"];
                $SumTotal = $SumTotal + $Total;
        ?>
                        <?php echo $_SESSION["strProductID"][$i]; ?><input type="hidden" name="txtProductID<?= $i; ?>" value="<?= $_SESSION["strProductID"][$i]; ?>">
                        <?php echo $objResult["product_name"]; ?>
                        <?php echo $objResult["product_price"]; ?> 
                        <?php print_r($_SESSION["strProductID"]); ?>                
                        <input type="text" name="txtQty<?= $i; ?>" value="<?= $_SESSION['strQty'][$i]; ?>" size="2">                                    
                        <?php echo number_format($Total, 2); ?>             
                  <a href="delete.php?Line=<?php echo $i; ?>">x</a>
                
        <?php
                 echo $_SESSION["strProductID"][$i];}
        }
        ?>
                </li>
              
             
            </ul>
        </div>
    </div>

   
      
  
    Sum Total
    <?php echo number_format($SumTotal, 2); ?>
    <br><br><a href="shop.php">Go to Product</a>
    <?php
    if ($SumTotal > 0) {
    ?>
        | <a href="checkout.php">CheckOut</a>
    <?php
    }
    ?>

</body>

</html>
<!-- <td width="101">ProductID</td>
            <td width="82">ProductName</td>
            <td width="82">Price</td>
            <td width="79">Qty</td>
            <td width="79">Total</td>
            <td width="10">Del</td> -->