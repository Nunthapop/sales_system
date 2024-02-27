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

    $query = "UPDATE product
    SET product_name='$name', product_description=' $price',product_price='$des',amount='$qty',product_type='$type' where product_id = '$id'";
    $result = mysqli_query($connect, $query); 
    
    if(!$result){
        die("something went wrong");
    }else{
    echo "Added Successful";
    header("edit_prop.php");
}


}
else
header("location: edit_prop.php");
?>