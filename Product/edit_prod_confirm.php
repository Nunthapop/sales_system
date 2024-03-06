<?php include "../header/nav.php";?>
<?php 
$id = $_GET['id'];
if (isset($_POST['submit']))
{
    $name = $_POST['prod_name'];
    $price =$_POST['price'];
    $des =$_POST['des'];
    $qty =$_POST['qty'];
    $type =$_POST['type'];
 

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"]; 

    $folder = "../image/". $filename;
    $query = "UPDATE product
    SET product_name='$name', product_description=' $des',product_price='$price',amount='$qty',product_type='$type' 
    ,image = '$filename'  where product_id = '$id'";
    $result = mysqli_query($connect, $query); 
    
    if(!$result){
        die ("insert error");
    } 
    if (move_uploaded_file($tempname, $folder)){
        header('Location:product.php');
    }

}
else
header("location:product.php");
?>