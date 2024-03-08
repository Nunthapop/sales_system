<?php
include "../header/nav_cus.php";

?>
<!DOCTYPE html>

<body>

    <h1>History</h1>
    <table>
        <tr>
            <td>Order id</td>
            <td>Date</td>
            <td>Order Total</td>
            <td>Payment</td>
        </tr>
        <?php


        ?>
        <?php
        $query = "SELECT * FROM orders_detail join orders using (orders_id) join invoices using (orders_id) where customers_id =  '" . $_SESSION['customers_id'] . "' ";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td>
                    <?= $row['orders_id'] ?>
                </td>
                <td>
                    <?= $row['date'] ?>
                </td>
                <td>
                    <?= $row['orders_total'] ?>
                </td>
                <td>
                    <?= "Cash" ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>