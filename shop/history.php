<?php
include_once "../header/nav_cus.php";

?>
<!DOCTYPE html>

<head>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Montserrat+Subrayada:wght@400;700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/history.css">
</head>

<body>

    <h1>History</h1>
    <table class="table">
        <tr>
            <td>Order id</td>
            <td>Date</td>
            <td>Order Total</td>
            <td>Payment</td>
        </tr>

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