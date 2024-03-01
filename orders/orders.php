<?php
include "../header/nav.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$query = "SELECT * FROM orders join orders_detail using (orders_id) join customers using(customers_id)";
$result = mysqli_query($connect, $query); ?>

<body>
    <div class="orders">
        <TABLE>
            <tr>
                <th>Purchase number</th>
                <th>Create at</th>
                <th>customer </th>
                <th>Orders total</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['orders_id']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['cus_first_name']; ?></td>
                    <td><?php echo $row['orders_total']; ?></td>
                    <td><div class="add"><a href="orders_detail.php?id=<?php echo$row['orders_id'];?>">GET IN</a></div></td>
                </tr>
            <?php } ?>

        </TABLE>
    </div>

</body>

</html>