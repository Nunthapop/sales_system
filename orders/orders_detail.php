<?php
include "../header/nav.php";

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders_detail</title>
    <link rel="stylesheet" href="../css/orders.css">
</head>
<?php
$query = "SELECT * FROM orders join orders_detail using (orders_id) 
join customers using(customers_id) join product using (product_id) join membership using (membership_id) where orders_id =$id";
$result = mysqli_query($connect, $query); ?>
<?php
$query = "SELECT * FROM orders join orders_detail using (orders_id) 
join customers using(customers_id) join product using (product_id) join membership using (membership_id) join employee using(employee_id) where orders_id =$id";
$result2 = mysqli_query($connect, $query); ?>
          <?php if ($row = mysqli_fetch_assoc($result2)) {
             
             ?>
<body>
    <main>
        <div class="parent-box">
            <div class="header_title">
               <h2>Orders Detail || P.o.# <?php echo $id; ?> </h2> 
               <div class="box2"> <h3>Customer ID:<?php  echo $row['customers_id'];?></h3>
               <h3> Date issued:<?php  echo $row['date'];?></h3>
               <h3>   Sales person:<?php  echo $row['emp_name'];?></h3>
               
             
            </div>
                
            </div>
  

            <div class="delivery">
                <div class="bill">
                    <h3> Bill to:</h3><?php  
                    echo $row['cus_first_name'];  
                    echo $row['cus_last_name'];?>
                    <h4>  <?php  echo $row['address'];?></h4>
                    <h4>  <?php  echo $row['telephone'];?></h4>
               
                </div>
                <div class="ship">
                <h3> Ship to:</h3><?php  
                    echo $row['cus_first_name'];  
                    echo $row['cus_last_name'];?>s
                    <h4>  <?php  echo $row['address'];?></h4>
                    <h4>  <?php  echo $row['telephone'];?></h4>
                <?php }?>
                </div>
              
            </div>
            <TABLE>
                <tr>
                    <th>ITEMS</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE </th>
                    <th>product_type</th>
                    <th> QTY</th>
                    <th> TOTAL</th>
                </tr>
                <?php
                $previousOrderId = null;
                $total = 0;
                while ($row = mysqli_fetch_assoc($result)) {

                    //$total =$row['orders_total'];
                    $name = $row['cus_first_name'] . ' ' . $row['cus_last_name'];
                    $total += $row['product_price'] * $row['qty'];
                    $membership_dis = $row['member_discount'];
                ?>



                    <tr>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_description']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><?php echo $row['product_type']; ?></td>
                        <td><?php echo $row['qty']; ?></td>
                        <td><?php echo $row['product_price'] * $row['qty']; ?></td>

                    </tr>
                <?php } ?>
            </TABLE>


            <?php //echo $total  . $name; 
            echo $total; ?>
</body>

</html>
<?php
$discount = 10; //
$dis_price = 0;
$orders_total = 0;
//calculate discount for requirement and membership discount
if ($total >= 20) {
    $dis_price = ($total / 100) * ($discount + $membership_dis);
    $orders_total = $total - $dis_price;
} else {
    $dis_price = ($total / 100) * $membership_dis;
    $orders_total = $total - $dis_price;
}
echo 'net' . $orders_total;


?> </div>
</main>