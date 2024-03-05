<?php
session_start();
include_once "../config/config.php";
$username = $_POST['username'];
$password = $_POST['password'];


$userQuery = "SELECT * FROM customers where cus_first_name = '$username' and cus_password = '$password'";
$result = mysqli_query($connect, $userQuery);

if (!$result) {
    die("cannot run query");
}
if (mysqli_num_rows($result) == 0) {
    $_SESSION['error_msg1'] = "Username or Password is incorrect .";
    header("Location: login_cus.php");
} else {
    $row = mysqli_fetch_assoc($result);

    if (
        ($_POST['username'] == $row['cus_first_name']) && ($_POST['password'] == $row['cus_password'])
    ) {
        $_SESSION['cus_first_name'] = $row['cus_first_name'];
        $_SESSION['cus_last_name'] = $row['cus_last_name'];
        $_SESSION['member_level'] = $row['member_level'];

        header("Location: ../shop/shop.php");
    } else {
        $_SESSION['error_msg'] = "username or password is incorrect";
        header("Location: login_cus.php");
    }
}
?>