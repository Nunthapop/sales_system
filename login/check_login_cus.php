<?php
session_start();
include_once "../config/config.php";
$username = $_POST['name'];
$password = $_POST['password'];

$_SESSION['email'] = $username;
$userQuery = "SELECT * FROM customers where email = '$username'and password = '$password'";
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
        ($_POST['name'] == $row['email']) && ($_POST['password'] == $row['password'])
    ) {
        $_SESSION['customers_id'] =  $row['customers_id'];
        $_SESSION['cus_first_name'] = $row['cus_first_name'];
        $_SESSION['cus_last_name'] = $row['cus_last_name'];
        $_SESSION['member_level'] = $row['member_level'];

        header("Location: ../shop/shop.php");
    } else {
        $_SESSION['error_msg'] = "username or password is incorrect";
        echo $_SESSION['error_msg'];
        header("Location: login_cus.php");
    }
}
?>