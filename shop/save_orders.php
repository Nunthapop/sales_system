<?php
include "../header/nav_cus.php";

// Assuming $connect is your database connection
$cus_id = $_SESSION['customers_id'];
// echo  $cus_id;
$date = date("Y-m-d G:i:s");
$address_cus = $_POST['address'];

// $query_add = "UPDATE customers
// SET address = $address_cus where customers_id = '$cus_id'" ;
// $result_add = mysqli_query($connect, $query_add);

// Make sure total is properly sanitized and validated




$query1 = "SELECT * FROM customers JOIN membership ON customers.membership_id = membership.membership_id WHERE customers_id = $cus_id";
$result1 = mysqli_query($connect, $query1);

if ($result1 && mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_array($result1);
    $membership_id = $row1['membership_id'];
    $member_discount = $row1['member_discount'];

    $discount = 10; // Assuming a fixed discount of 10

    $dis_price = 0;
    $all_discount = 0; // Variable to hold total discount
    $subtotal = $_SESSION['subtotal'];

    // Calculate discount for requirement and membership discount
    if ($subtotal >= 1200) {
        $dis_price = ($subtotal / 100) * ($discount + $member_discount);
        $all_discount = $discount + $member_discount;
    } else {
        $dis_price = ($subtotal / 100) * $member_discount;
        $all_discount =  $member_discount;
    }

    $total = $subtotal - $dis_price;

    $status = 'Payment complete';
    $del_status = 'Start delivery';
    $total_sql = $_SESSION['$total'];
    $query2 = "INSERT INTO orders 
    (date, orders_total, discount, status, del_status, customers_id,employee_id) 
    VALUES 
    ('$date', ' $total_sql', '$all_discount', '$status', '$del_status', '$cus_id', 1)";
    $result2 = mysqli_query($connect, $query2);





    if ($result2) {
        $order_id = mysqli_insert_id($connect);

        foreach ($_SESSION['cart'] as $p_id => $qty) {
            $sql = "SELECT * FROM product WHERE product_id = $p_id";
            $query4 = mysqli_query($connect, $sql);

            if ($query4 && mysqli_num_rows($query4) > 0) {
                $row3 = mysqli_fetch_assoc($query4);
                // deduckstock  
                $new_stock = $row3['amount'] - $qty;
                $sql_stock = "UPDATE product
                SET amount = $new_stock where product_id = '$p_id'";
                $query_stock = mysqli_query($connect, $sql_stock);

                $sql4 = "INSERT INTO orders_detail (qty, orders_id, product_id) 
                VALUES ('$qty', '$order_id', '$p_id')";
                $query5 = mysqli_query($connect, $sql4);

                if (!$query5) {
                    // Handle error
                    echo "Error: " . mysqli_error($connect);
                }
            }
        }
        $query_invoices = "INSERT INTO invoices
    (payment,invoices_date,orders_id) 
    VALUES 
    ('Cash', '$date',$order_id )";
        $result2 = mysqli_query($connect, $query_invoices);
        unset($_SESSION['cart']);
    } else {
        // Handle error
        echo "Error: " . mysqli_error($connect);
    }
} else {
    // Handle no result found
    echo "No customer found or invalid session data.";
}
