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
<?php   $p_id = $_GET['id']; 
$act = $_GET['action']; 
echo $p_id;
$sql = "SELECT * FROM product";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
echo $row['product_name'];
  

// if($p_id == 0){
//   echo "<div class='empty'> Ops...Your card is empty</div>";
// }


if($act=='add' && !empty($p_id))
{
    if(isset($_SESSION['cart'][$p_id]))
    {
        $_SESSION['cart'][$p_id]++; //post increment  $session[][idที่ add มา] => array (จำนวนที่เรากดใส่ตะกร้า)
    }
    else
    {
        $_SESSION['cart'][$p_id]=1; //จำนวนเริ่มต้นของตะกร้า
    }
}
if($act=='decrement' && !empty($p_id)){
    if(isset($_SESSION['cart'][$p_id]))
    {
        $_SESSION['cart'][$p_id]--;
    }
    if($_SESSION['cart'][$p_id] < 1){ //
        unset($_SESSION['cart'][$p_id]);
        header("location:show.php?id=0&action=non");
    }
}

if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
{
    unset($_SESSION['cart'][$p_id]);
}



?> 

<?php 
if(!empty($_SESSION['cart'])) {
    // print_r($_SESSION['cart']);
    
    $total = 0;
    foreach($_SESSION['cart'] as $p_id=>$qty) {
        echo $qty . '<br>' . $p_id ;
        echo $p_id;
        $query = "SELECT * FROM product where product_id = $p_id";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($result);
        $sum = $row['product_price'] * $qty;
        $total += $sum;
?>
    <div class="product">
        <div class="grid2">
            <div class="product-name"><?php echo $row['product_name']?></div>
            <div class="price"><?php echo number_format($sum,2)?> ฿</div>
        </div>
        <div class="grid3">
            <div class="add">
                <div class="box-add">
                    <div class="Decrements"> <a href="show.php?id=<?php echo $p_id ?>&action=decrement">-</a></div>
                    <div class="qty"><?php echo $qty?></div>
                    <div class="Increments"><a href="show.php?id=<?php echo $p_id ?>&action=add">+</a></div>
                </div>
                <div class="remove"><a href='show.php?id=<?php echo $p_id ?>&action=remove'>Remove</a></div>
            </div>
        </div>
    </div> 
<?php 
    }
} else {
    echo "<div class='empty'> Ops...Your card is empty!</div>";
}
?>

     
        ?>
         <input type="submit" value="checkout" name="checkout"> 
        </form>   
                                       
           
           
           

</body>

</html>