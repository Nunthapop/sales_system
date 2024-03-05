<?php session_start();
include_once "../config/config.php"; 



 


// if(($_POST['del_status']) === 'Delivered'){
   
//     header("location: orders_detail.php");
// }
// else
// {
//     $id = $_GET['id'];
//     $query = "UPDATE orders
//     SET del_status='Delivered' where orders_id = $id";
//     $result = mysqli_query($connect, $query); 
//     header("location: orders_detail.php");
// }



if(isset($_POST['del_status'])) {
    if($_POST['del_status'] === 'Delivered') {
        header("location: orders.php");
        exit; // Always exit after sending a header redirect
    } else {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            // Sanitize the ID
            $id = intval($id);
               
            // Include your database connection file
       

            // Update the delivery status for the specific order
            $query = "UPDATE orders SET del_status='Delivered', status ='Payment complete' WHERE orders_id = $id";
            $result = mysqli_query($connect, $query);

            if($result) {
                $_SESSION['script_del'] = " <script> alert('Goods have been delivered')</script> ";
                header("location: orders.php");
                exit;
            } else {
                // Handle the query error
                echo "Error updating delivery status: " . mysqli_error($connect);
            }
        } else {
            echo "Order ID is not set.";
        }
    }
} else {
    echo "Delivery status is not set.";
}





?>