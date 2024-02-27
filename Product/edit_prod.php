<?php 
include "../header/nav.php";
$id = $_GET['id'];

echo $id;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <title>Document</title>
</head>

<body>

<form action=" edit_prod_confirm.php?id=<?php echo $id?>" method="post">
    <?php
    
    $query = "SELECT * FROM product where product_id = $id";
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
                <td><input type="text" value="<?php echo $row['product_name']; ?>"name="prod_name"></td>
                <td> <input type="text" value="<?php echo number_format($row['product_price'], 2) ?>"name="price"></td>
                <td><input type="text" value="<?php echo $row['product_description']; ?>"name="des"></td>
                <td><input type="text" value="<?php echo $row['amount']; ?>"name="qty"></td>
                <td><input type="text" value="<?php echo $row['product_type']; ?>"name="type"></td>
                <input type="submit" name="submit" value="save" >
                    <input type="reset" name="reset" value="CANCEL">

            </tr>




        <?php } ?>
        </form>
</body>

</html>