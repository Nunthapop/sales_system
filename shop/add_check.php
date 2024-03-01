<?php include "../header/nav.php";


if (empty($_POST['name']) && empty($_POST['price']) && empty($_POST['qty'])) {
    header('Location:../admin.php');
} else {
    //product
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $type = $_POST['type'];
    //customer
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tele = $_POST['tele'];
    $address = $_POST['address'];

    $query = "INSERT INTO customers (cus_first_name,cus_last_name,telephone,address) VALUE('$fname','$lname','$tele','$address')";
    $result = mysqli_query($connect, $query);
    if (!$result) {
        die("insert error");
    }


    header('Location:shop.php');

}
?>