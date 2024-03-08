<?php
include_once "../config/config.php";

?>

<!DOCTYPE html>

<head>
    <html lang="en">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Montserrat+Subrayada:wght@400;700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Montserrat+Subrayada:wght@400;700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/bill.css">

</head>

<body>
    <div class="parent-box">
        <?php $query1 = "SELECT * FROM orders";
        $result1 = mysqli_query($connect, $query1);
        ?>
        <img src="../image/logo.png">
        <h1>Bill</h1>
        <div class="header">
            <?php
            $row = mysqli_fetch_assoc($result1) ?>
            <?= "Orders_id: " . $row['orders_id']; ?>
            <?= "Date: " . $row['date']; ?><br>
            <?= "Status: " . $row['status']; ?>
            <?= "Del_status: " . $row['del_status']; ?><br>
            <?= "Customer_id: " . $row['customers_id'] ?>
            <?= "employee_id: " . $row['employee_id']; ?><br>
        </div>
        <table>

            <tr class="headtable">
                <td>Product_Name</td>
                <td>Price</td>
                <td>Quantity</td>
            </tr>

            <?php
            $query2 = "SELECT * FROM product join orders_detail using (product_id)";
            $result2 = mysqli_query($connect, $query2);
            while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                <tr>
                    <td>
                        <?= $row2['product_name']; ?>
                    </td>
                    <td>
                        <?= $row2['product_price']; ?>
                    </td>
                    <td>
                        <?= $row2['qty']; ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <div class="footer">
            <?= "Tax: 0"; ?><br>
            <?= "Delivery: 0"; ?><br>
            <?= "Total: " . $row['orders_total']; ?>
        </div>
    </div>
</body>

</html>