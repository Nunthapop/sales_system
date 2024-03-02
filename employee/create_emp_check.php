<?php include "../header/nav.php";


if(empty($_POST['name']))
{
    header('Location:../admin.php');
}
else{
    $name = $_POST['name'];
    $pos =$_POST['position'];
    
$query = "INSERT INTO employee (emp_name,emp_position) 
VALUES ('$name','$pos')";

    
    $result = mysqli_query($connect, $query);
    if(!$result){
        die ("insert error");
    } 
    
    header('Location:emp.php');
    
}


?>
