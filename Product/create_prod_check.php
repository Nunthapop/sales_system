<?php include "../header/nav.php";


if(empty($_POST['name']) && empty($_POST['price']) && empty($_POST['qty']))
{
    header('Location:../admin.php');
}
else{
   
   
    $name = $_POST['name'];
    $price =$_POST['price'] ;
    $des =$_POST['des'];
    $qty =$_POST['qty'];
    $type =$_POST['type'];
    if($type == 'Jasmine'){
        $added = 39;
    }
    else if($type == 'soy' or $type == 'coconut') {
        $added = 29;
    }
    else if($type == 'Bees'){ 
        $added = 19;
    }
    else{
        $added =0;
    }
    $price =  $price + $added;

    $filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"]; 
$folder = "../image/". $filename;



$query = "INSERT INTO product (product_name,product_description,product_price,amount,product_type,image) 
VALUE('$name','$des','$price','$qty','$type','$filename')";


    $result = mysqli_query($connect, $query);
    if(!$result){
        die ("insert error");
    } 
    if (move_uploaded_file($tempname, $folder)){
        header('Location:product.php');
    }
    
    
    
}


?>

