<?php
include "../header/nav.php";

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders_detail</title>
</head>
<?php
$query = "SELECT * FROM orders join orders_detail using (orders_id) 
join customers using(customers_id) join product using (product_id) join membership using (membership_id) where orders_id =$id";
$result = mysqli_query($connect, $query); ?>

<body>
    <div class="orders">
        <TABLE>
            <tr>
                <th>Items</th>
                <th>Description</th>
                <th>price </th>
                <th>product_type</th>
                <th> amount</th>
                <th> total</th>
            </tr>
            <?php
            $previousOrderId = null;
            $total = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                //$total =$row['orders_total'];
                $name = $row['cus_first_name'] . ' ' . $row['cus_last_name'];
                $total += $row['product_price'] * $row['qty'];
                $membership_dis = $row['member_discount'];
            ?>



                <tr>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['product_description']; ?></td>
                    <td><?php echo $row['product_price']; ?></td>
                    <td><?php echo $row['product_type']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['product_price'] * $row['qty']; ?></td>


                <?php } ?>
        </TABLE>
    </div>

    <?php //echo $total  . $name; 
    echo $total; ?>
</body>
</html>
<?php
$discount =10; //
$dis_price = 0;
$orders_total = 0;
//calculate discount for requirement and membership discount
if ($total >= 20) {
    $dis_price =($total/100) * ($discount + $membership_dis);
    $orders_total = $total - $dis_price;
}
else{
    $dis_price =($total/100) * $membership_dis;
    $orders_total = $total - $dis_price;
}
echo 'net' . $orders_total;

    
?>