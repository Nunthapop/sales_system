<?php require "header_index.php";

$email =$_POST['email'];
$address =$_POST['address'];
$phone =$_POST['phone'];
$date = Date("Y-m-d G:i:s");
$customer_id = $_SESSION['customer_id'];
$total = $_POST['total'];



$query1 = "INSERT INTO order_head ( `customer_id`, `date`, `total`, `address`, `phone`, `email`) VALUES ( '$customer_id', '$date', '$total', '$address', '$phone', '$email')";
$result = mysqli_query($connect, $query1);

$query2 ="SELECT max(id) as id FROM order_head where customer_id = $customer_id  ";
$result2 = mysqli_query($connect, $query2);
$row = mysqli_fetch_array($result2);
$order_id = $row["id"];
//not edit yet
foreach($_SESSION['cart'] as $p_id=>$qty)
{
    $sql3	= "SELECT * from product where id=$p_id";
    $query3	= mysqli_query($connect, $sql3);
    $row3	= mysqli_fetch_assoc($query3);
    $total	= $row3['product_price']*$qty;
    
    $sql4	= "INSERT INTO order_detail ( `order_head_id`, `product_id`, `qty`, `sub_total`) 
    VALUES  ( '$order_id', '$p_id', '$qty', '$total')";
    $query4	= mysqli_query($connect, $sql4);
}

if($query1 and $query4 ){
    echo "trasition success";
    foreach($_SESSION['cart'] as $id){
        unset($_SESSION['cart']);
    }
    Header("Location:order_confirmed.php");
}

?>
