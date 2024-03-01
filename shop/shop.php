<?php
include "../header/nav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
    <div class="main">
        <?php
        $query = "SELECT * FROM orders join orders_detail using (orders_id) join customers using (customers_id)";
        $result = mysqli_query($connect, $query); ?>
        <table>
            <tr>
                <th>Order_id</th>
                <th>Customer Name</th>
                <th>Quantity</th>
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
                </tr>
            <?php } ?>
            <div><a href="add.php">Add</a></div>
        </table>
    </div>
</body>

</html>