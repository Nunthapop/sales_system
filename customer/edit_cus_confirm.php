<?php include "../header/nav.php";?>
<?php 
$id = $_GET['id'];
if (isset($_POST['submit']))
{
    $namef = $_POST['first_n'];
    $namel =$_POST['last_n'];
    $tel =$_POST['telephone'];
    $adds =$_POST['address'];
    $mem =$_POST['member_name'];
    echo $mem;

    
    

    $query = "UPDATE customers  
    SET cus_first_name='$namef', cus_last_name=' $namel' 
    ,telephone ='$tel',address ='$adds',membership_id ='$mem' 
    where customers_id = '$id'";
    $result = mysqli_query($connect, $query); 
    
    
    if(!$result){
        die("something went wrong");
    }else{
    echo "Added Successful";
    header("location: customer.php");
}


}
else
header("location: customer.php");
?>