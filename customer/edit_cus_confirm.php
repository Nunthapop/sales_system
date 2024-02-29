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

    

    $query = "UPDATE customers join  membership using(membership_id)
    SET cus_first_name='$namef', cus_last_name=' $namel' 
    ,telephone ='$tel',address ='$adds',member_name='$mem' 
    
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