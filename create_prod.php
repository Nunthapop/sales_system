<?php include "header/nav.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create product</title>
</head>
<body>
    <form action="insert_prod.php" method="post">
   <div>Product name: <input type="text" name="name"></div>
   <div>Product price: <input type="text" name="price"></div>
   <div>Product description: <input type="text" name="des"></div>
   <div>amount: <input type="text" name="qty"></div>
   <div>type <input type="text" name="type"></div>
   </form>
</body>
</html>