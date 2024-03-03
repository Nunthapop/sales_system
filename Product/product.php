<!--For admin-->
<?php 
include "../header/nav.php"; ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/product.css"> 
    <title>Document</title>
    <?php $background_image = "https://worldchemical.co.th/wp-content/uploads/2023/07/high-angle-lit-candles-with-string-pine-cones-scaled.jpg";
    ?>
    <style>
    body {
    background-image: url('<?php echo $background_image; ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    }
    </style>  
    


</head>

<body>
<main>
    <div class="parent-box">

    

        <?php
        $query = "SELECT * FROM product";
        $result = mysqli_query($connect, $query); ?>
        <h2>Product</h2> 
        <table> 
            
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>QTY</th>
                <th>Type</th>
                <th>Edit</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>



                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td>
                    
                    <?php echo number_format($row['product_price'], 2) ?></td>
                    <td><?php echo $row['product_description']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['product_type']; ?></td>
                    <td>
                    <?php if ($_SESSION['emp_level'] == '1'){
                       ?><div class="add"><a href="edit_prod.php?id=<?php echo$row["product_id"];?>">Edit</a></div><?php
                       
                    } 
                    else{
                        echo 'Only Manager';
                    }?>
                    </td>
                   
                </tr>




            <?php } ?>
            </table>
            <?php if ($_SESSION['emp_position'] == 'Manager'){
                echo ' <div class="create"><a href="create_prod.php">Create</a></div>';
            }
            
            ?>
           
            </div>
       
            </main>
</body>

</html>