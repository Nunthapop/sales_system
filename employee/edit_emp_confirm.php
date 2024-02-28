<?php include "../header/nav.php";?>
<?php 
$id = $_GET['id'];
if (isset($_POST['submit']))
{
    $name = $_POST['emp_name'];
    $po =$_POST['position'];
    

    $query = "UPDATE employee
    SET emp_name='$name', emp_position=' $po' where employee_id = '$id'";
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