<!--For admin-->
<?php 
include "../header/nav.php"; ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <title>Document</title>

</head>

<body>
    <h1>Product-admin</h1>


    <div class="main">
        <?php
        $query = "SELECT * FROM product";
        $result = mysqli_query($connect, $query); ?>
        <table>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>price</th>
                <th>des</th>
                <th>amt</th>
                <th>type</th>
                <th>Edit</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>



                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo number_format($row['product_price'], 2) ?></td>
                    <td><?php echo $row['product_description']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['product_type']; ?></td>
                    <td><div class="add"><a href="edit_prod.php?id=<?php echo$row['product_id'];?>">GET IN</a></div></td>
                </tr>




            <?php } ?>
                    <div><a href="create_prod.php">Create</a></div>

    </div>
</body>

</html>