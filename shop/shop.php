<?php
include "../header/nav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
    <div class="main">
        <?php
        $query = "SELECT * FROM product";
        $result = mysqli_query($connect, $query); ?>
        <table>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>price</th>
                <th>amt</th>
                <th>type</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>



                <tr>
                    <td>
                        <?php echo $row['product_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['product_name']; ?>
                    </td>
                    <td>

                        <?php echo number_format($row['product_price'], 2) ?>
                    </td>
                    <td>
                        <?php echo $row['amount']; ?>
                    </td>
                    <td>
                        <?php echo $row['product_type']; ?>
                    </td>
                </tr>
            <?php } ?>
            <div><a href="add.php">Add</a></div>

    </div>
</body>

</html>