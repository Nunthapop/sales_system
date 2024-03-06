<?php
include "../header/nav.php";
$id = $_GET['id'];

echo "Product ID $id";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit_prod.css">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="parent-box">
            <h2>Product Management</h2>
            <form action=" edit_prod_confirm.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                <?php

                $query = "SELECT * FROM product where product_id = $id";
                $result = mysqli_query($connect, $query); ?>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Image</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>



                        <tr>
                            <td><?php echo $row['product_id']; ?></td>
                            <td><input type="text" value="<?php echo $row['product_name']; ?>" name="prod_name"></td>
                            <td> <input type="text" value="<?php echo number_format($row['product_price'], 2) ?>" name="price"></td>
                            <td><input type="text" value="<?php echo $row['product_description']; ?>" name="des"></td>
                            <td><input type="number" value="<?php echo $row['amount']; ?>" name="qty"></td>
                            <td><select name="type">
                                    <option value="Jasmine">Jasmine rice wax +39</option>
                                    <option value="Paraffin">Paraffin wax </option>
                                    <option value="soy">soy way +29</option>
                                    <option value="Coconut">Coconut wax +29</option>
                                    <option value="Bees">Bees wax +19</option>
                                </select></td>
                            <td><img src="<?php echo ' ../image/' . $row['image']; ?>" alt="" class="image-pic"></td>
                        </tr>
                </table>

                <div>

                </div>
                
                <div class="upload-image"><input type="file" name="image" ></div>

            <?php } ?>
            <input type="submit" name="submit" value="SAVE">
            <input type="reset" name="reset" value="CANCEL">
            </form>
        </div>

    </main>


</body>

</html>