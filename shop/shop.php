<?php
include "../header/nav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
    <div class="main">
        <?php
        $query = "SELECT o.orders_id,o.date,o.customers_id,od.qty,od.product_id FROM orders o inner join orders_detail od on o.orders_id = od.orders_id";
        $result = mysqli_query($connect, $query, ); ?>
        <table>
            <tr>
                <th>Order_id</th>
                <th>Date</th>
                <th>Customer_id</th>
                <th>Quantity</th>
                <th>Product_id</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <?php echo $row['orders_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['date']; ?>
                    </td>
                    <td>
                        <?php echo $row['customers_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['qty']; ?>
                    </td>
                    <td>
                        <?php echo $row['product_id']; ?>
                    </td>
                </tr>
            <?php } ?>
            <div><a href="add.php">Add</a></div>
        </table>
    </div>
</body>

</html>