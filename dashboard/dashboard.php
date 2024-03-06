<?php include "../header/nav.php";

$query1 = "SELECT 
(SELECT COUNT(orders_id) FROM orders) AS total_orders,
(SELECT SUM(orders_total) FROM orders) AS total_amount,
(SELECT sum(amount)  from product) as stock;
 ";
$result1 = mysqli_query($connect, $query1);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/db.css">
    <title>Add Emp</title>
</head>
<body>
<div class="parent-box">
    <h1>Overall</h1>
   <div class="upside">
    <div class="total_sales">
    <?php if ($row = mysqli_fetch_assoc($result1)) {?>
    <i class="fa-solid fa-money-bill-trend-up fa-6x" style="color: #0D1282;"></i>
     <h1>Total sales :</h1><h2><?php echo $row['total_amount']?> ฿</h2>
    </div>
   
    <div class="scount">
    <i class="fa-solid fa-clipboard-check fa-2x" style="color: #211951;"></i>
    <h1>Sales count:</h1><h2><?php echo $row['total_orders']?></h2>
    </div>
    <div class="stock">
    <i class="fa-solid fa-warehouse fa-2x" style="color: #211951;"></i>
    <h1>Inventory:</h1><h2><?php echo $row['stock']?></h2>     <?php }?>
    </div>
   </div>
  
</body>
</html>