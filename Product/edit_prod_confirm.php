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
    $added =0;
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
 
if(!empty($_FILES["image"])){
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"]; 

    $folder = "../image/". $filename;
    $query = "UPDATE product
    SET product_name='$name', product_description=' $des',product_price='$price',amount='$qty',product_type='$type' 
    ,image = '$filename'  where product_id = '$id'";
    $result = mysqli_query($connect, $query); 
}
else {
    $query = "UPDATE product
    SET product_name='$name', product_description=' $des',product_price='$price',amount='$qty',product_type='$type' 
      where product_id = '$id'";
    $result = mysqli_query($connect, $query); 
    
}

    
    
    
    if($result){
        
        header('Location:product.php');
    } 
    if (move_uploaded_file($tempname, $folder)){
        header('Location:product.php');
    }

}
else
header("location:product.php");
?>
<!-- if(!empty($_FILES["image"])) {
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"]; 

    $folder = "../image/" . $filename;
    
    // Check if the file has been successfully moved before updating the database
    if (move_uploaded_file($tempname, $folder)) {
        $query = "UPDATE product
                  SET product_name='$name', product_description='$des', product_price='$price', amount='$qty', product_type='$type', image='$filename'
                  WHERE product_id='$id'";
        $result = mysqli_query($connect, $query); 

        if ($result) {
            header('Location: product.php');
            exit(); // Terminate script after redirection
        } else {
            // Handle database update failure
            echo "Database update failed.";
        }
    } else {
        // Handle file upload failure
        echo "File upload failed.";
    }
} else {
    $query = "UPDATE product
              SET product_name='$name', product_description='$des', product_price='$price', amount='$qty', product_type='$type'
              WHERE product_id='$id'";
    $result = mysqli_query($connect, $query); 

    if ($result) {
        header('Location: product.php');
        exit(); // Terminate script after redirection
    } else {
        // Handle database update failure
        echo "Database update failed.";
    }
} -->