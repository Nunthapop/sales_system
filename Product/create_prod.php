<?php include "../header/nav.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create_pro.css">
    <title>Create product</title>
    <?php
    $background_image = "https://f.btwcdn.com/store-46610/product/68e5bee4-cf8e-cc51-4450-61aa23af42ff.jpg";
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
<form action="create_prod_check.php" method="post">
    
<h2>Create product</h2>
    <div>Product name: <input type="text" name="name"></div>
    <div>Product price: <input type="text" name="price"></div>
    <div>Product description: <input type="text" name="des"></div>
    <div>Quantity: <input type="text" name="qty"></div>
    <div>Type <select  name="type">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
 </div>
    <button> go</button>
</form>
</main>

</body>
</html>

