<?php
include "../header/nav.php";

$id = $_GET['id'];
// $_SESSION['script_del']

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders_detail</title>
    <link rel="stylesheet" href="../css/orders_de.css">
</head>
<?php
$query1 = "SELECT * FROM orders join orders_detail using (orders_id) 
join customers using(customers_id) join product using (product_id) join membership using (membership_id) join employee using(employee_id) where orders_id =$id";
$result = mysqli_query($connect, $query1); ?>

<?php
$query2 = "SELECT * FROM orders join orders_detail using (orders_id) 
join customers using(customers_id) join product using (product_id) join membership using (membership_id) join employee using(employee_id) where orders_id =$id";
$result2 = mysqli_query($connect, $query2); ?>

<?php
$query3 = "SELECT * FROM orders join orders_detail using (orders_id) 
join customers using(customers_id) join product using (product_id) join membership using (membership_id) join employee using(employee_id) where orders_id =$id";
$result3 = mysqli_query($connect, $query3); ?>
<?php if ($row = mysqli_fetch_assoc($result)) {

?>

    <body>
        <main>
            <div class="parent-box">
                <div class="header_title">
                    <h2> <i class="fa-regular fa-file-lines fa-xl"></i>Orders Detail || P.o.# <?php echo $id; ?> </h2>
                    <div class="box2">
                        <h3>Customer ID:<?php echo $row['customers_id'] . ' :' . $row['member_name']; ?></h3>
                        <h3> Date issued:<?php echo $row['date']; ?></h3>
                        <h3> Sales person:<?php echo $row['emp_name']; ?></h3>
                    </div>

                </div>


                <div class="delivery">
                    <div class="bill">
                        <h3> Bill to:</h3>
                        <h4> <?php
                                echo $row['cus_first_name'];
                                echo $row['cus_last_name']; ?></h4>
                        <h4> <?php echo $row['address']; ?></h4>
                        <h4> <?php echo $row['telephone']; ?></h4>

                    </div>
                    <div class="ship">
                        <h3> Ship to:</h3>
                        <h4> <?php
                                echo $row['cus_first_name'];
                                echo $row['cus_last_name']; ?></h4>
                        <h4> <?php echo $row['address']; ?></h4>
                        <h4> <?php echo $row['telephone']; ?></h4>
                    <?php } ?>
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
                    $subtotal = 0;
                    while ($row = mysqli_fetch_assoc($result2)) {

                        //$total =$row['orders_total'];
                        $name = $row['cus_first_name'] . ' ' . $row['cus_last_name'];
                        $subtotal += $row['product_price'] * $row['qty'];
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
                <?php

                $discount = 10; //
                $dis_price = 0;
                $total = 0;
                //calculate discount for requirement and membership discount
                if ($subtotal >= 1200) {
                    $dis_price = ($subtotal / 100) * ($discount + $membership_dis);
                    $total = $subtotal - $dis_price;
                } else {
                    $dis_price = ($subtotal / 100) * $membership_dis;
                    $total = $subtotal - $dis_price;
                }
                ?>
               
                   <ul class="total-detail">
                    <li><h4>Subtotal </h4><h4><?php echo $subtotal; ?></h4></li>
                    <li><h4>Discount</h4><h4> <?php echo $dis_price; ?></h4></li>
                    <li><h4>Tax</h4> <h4>Free</h4></li>
                    <li> <h4>Delivery</h4><h4>Free</h4></li>
                    <li> <h4>TOTAL</h4> <h4><?php echo $total; ?></h4></li>
                   </ul>
                        <!-- <th>Subtotal</th>
                        <th>Discount</th>
                        <th>Tax </th>
                        <th>Delivery</th>
                        <th>TOTAL</th> -->
                   


                    
                    
                        
                 
            </div>



            <form action="confirmed.php?id=<?php echo $id; ?>" method="post">
                <!-- Box end -->
                <div class="overall">


                    <?php
                    // Assuming $result contains the database query result
                    $row = mysqli_fetch_assoc($result3)
                    ?>
                        <?php if ($row['del_status'] == 'Delivered' and $row['status'] !== 'In issued') {
                            $icon = '<i class="fa-solid fa-clipboard-check fa-xl" style="color: #63E6BE;"></i>';
                            $icon_s = '<i class="fa-regular fa-circle-check fa-xl" style="color: #63E6BE;"></i>';
                        } else {
                            $icon_s = '<i class="fa-solid fa-clock-rotate-left" style="color: #e60a0a;"></i>';
                            $icon = '<i class="fa-solid fa-truck fa-fade fa-lg" id="delivery"></i>';
                        }
                        ?>
                        <div class="status">
                            <?php echo $icon_s; ?> Status: <?php echo $row['status']; ?>
                        </div>

                        <div class="invoices">


                            <button type='submit' name='del_status' value="<?php echo $row['del_status']; ?>"><?php echo $icon; ?> <?php echo $row['del_status']; ?></button>
                        </div>
                    <?php
                    // End of while loop 
                    ?>
                </div>
            </form>
        </main>
        <script src="orders.js"></script>
    </body>

</html>