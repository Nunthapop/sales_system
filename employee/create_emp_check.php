<?php include "../header/nav.php";


if(empty($_POST['name']) && empty($_POST['price']) && empty($_POST['qty']))
{
    header('Location:../admin.php');
}
else{
    $name = $_POST['name'];
    $price =$_POST['price'];
    $des =$_POST['des'];
    $qty =$_POST['qty'];
    $type =$_POST['type'];
$query = "INSERT INTO product (product_name,product_description,product_price,amount,product_type) 
VALUE('$name','$des','$price','$qty','$type')";

    
    $result = mysqli_query($connect, $query);
    if(!$result){
        die ("insert error");
    } 
    
    header('Location:product.php');
    
}


?>
