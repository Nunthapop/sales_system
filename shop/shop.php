<?php
include "../header/nav_cus.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            justify-content: center;
            align-items: center;
            margin: auto;
            padding: auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    $query = "SELECT * FROM product";
    $result = mysqli_query($connect, $query); ?>
    <center>
        <h1>Shop</h1>
        <table border="1">
            <tr>
                <td>ProductID</td>
                <td>ProductName</td>
                <td>Price</td>
                <td>Description</td>
                <td>Type</td>
                <td>Cart</td>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td width="100">
                        <?= $row['product_id']; ?>
                    </td width="100">
                    <td>
                        <?= $row['product_name']; ?>
                    </td>
                    <td width="100">
                        <?= number_format($row['product_price'], 2) ?>
                    </td>
                    <td width="100">
                        <?= $row['product_description']; ?>
                    </td>
                    <td width="100">
                        <?= $row['product_type']; ?>
                    </td>
                    <td><input Type="text" name="qty"></td>
                </tr>
            <?php } ?>
        </table>
        <br><input type="submit" name="submit">
    </center>

</body>

</html>