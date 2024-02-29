<?php include "../header/nav.php";


if(empty($_POST['first']))
{
    header('Location:../admin.php');
}
else{
    $first = $_POST['first'];
    $last =$_POST['last'];
    $tel = $_POST['tel'];
    $adds =$_POST['adds'];
    $member = $_POST['member'];
   
    
$query = "INSERT INTO customers (cus_first_name,cus_last_name,telephone,address,membership_id) 
VALUES ('$first','$last','$tel','$adds','$member')";

    
    $result = mysqli_query($connect, $query);
    if(!$result){
        die ("insert error");
    } 
    
    header('Location:customer.php');
    
}


?>
