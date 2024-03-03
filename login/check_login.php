<?php
session_start();
include_once "../config/config.php";
$username = $_POST['username'];
$password = $_POST['password'];


$userQuery="SELECT * FROM employee where emp_name = '$username' and emp_password = '$password' ";

$result = mysqli_query($connect, $userQuery);
if(!$result) {
    die ("cannot run query");
}
if(mysqli_num_rows($result) == 0){
    $_SESSION['error_msg1'] = "Username or Password is incorrect .";
    header("Location: login.php");
}
else{
$row = mysqli_fetch_assoc($result);

if (($_POST['username'] == $row['emp_name'])
&& ($_POST['password'] == $row['emp_password'])){
    $_SESSION['emp_id'] = $row['emp_id'];
    $_SESSION['emp_name'] = $row['emp_name'];
    $_SESSION['emp_position'] = $row['emp_position'];
    $_SESSION['emp_level'] = $row['emp_level'];
    
    header ("Location: ../product/product.php");
}
else{
    $_SESSION['error_msg'] = "username or password is incorrect";
    header ("Location: login.php");
}
}
?>