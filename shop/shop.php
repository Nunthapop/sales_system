<?php
include "../header/nav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
    <div class="main">
        <?php
        $query = "SELECT orders_id,orders_total,customers_id,employee_id,qty,product_name 
        from orders join orders_detail using (orders_id) join product using (product_id) join customers using (customers_id)";
        $result = mysqli_query($connect, $query); ?>
        <table>
            <tr>
                <th>Order_id</th>
                <th>Customer Name</th>
                <th>Quantity</th>
                <th>Product Name</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <?php echo $row['orders_id'] ?>
                    </td>
                    <td>
                        <?php echo $row['cus_first_name'];
                        echo $row['cus_last_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['qty']; ?>
                    </td>
                    <td>
                        <?php echo $row['product_name']; ?>
                    </td>

                </tr>
            <?php } ?>
            <div><a href="add.php">Add</a></div>
        </table>
    </div>
</body>

</html>