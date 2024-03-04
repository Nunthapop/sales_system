<?php include "../header/nav.php";

$level = 0;
if(empty($_POST['name']))
{
    header('Location:../admin.php');
}
else{
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $pos =$_POST['position'];
    if($pos =='manager'){
        $level = 1;
    }
    
$query = "INSERT INTO employee (emp_name,emp_position,emp_password,emp_level) 
VALUES ('$name','$pos','$pass','$level')";

    
    $result = mysqli_query($connect, $query);
    if(!$result){
        die ("insert error");
    } 
    
    header('Location:emp.php');
    
}


?>
