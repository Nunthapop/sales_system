<?php
include "../header/nav_cus.php";
$query = "SELECT * FROM orders_detail join orders using (orders_id) join invoices using (orders_id) where customers_id = '" . $_SESSiON['customers_id'] . "' ";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>

<body>
    <h1>History</h1>
    <table>
        <tr>
            <td>Product_Name</td>
            <td>Prod</td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>

</html>