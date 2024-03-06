<?php include "../header/nav.php";


if (empty($_POST['name']) && empty($_POST['price']) && empty($_POST['qty'])) {
    header('Location:../admin.php');
} else {
    $qty = $_POST['qty'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tele = $_POST['tele'];
    $address = $_POST['address'];

    if (isset($_POST['date'])) {
        $date = $_POST['date'];
        $dateObject = new DateTime($date);
    } else {
        echo "Warning: Date information is missing.";
    }

    $query = "INSERT INTO customers (customers_id,cus_first_name,cus_last_name,telephone,'address') VALUE(NULL,'$fname','$lname','$tele','$address')";
    $query = "INSERT INTO orders (orders_id,'date',orders_total,customers_id,employee_id) VALUE(NULL,$date,NULL,NULL,NULL)";
    $query = "INSERT INTO orders_detail (orders_detail_id,orders_id,qty,product_id) VALUE(NULL,NULL,$qty,NULL)";
    $result = mysqli_query($connect, $query);
    if (!$result) {
        die("insert error");
    }
    header('Location:shop.php');

}
?>