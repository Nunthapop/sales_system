<?php 
include "../header/nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/cus.css">
</head>
<body>
    
    

<main>
<div class="parent-box">
    <h2>Customer</h2>
    <?php
    $query = "SELECT * FROM customers join membership using (membership_id)";
    $result = mysqli_query($connect, $query); ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last Name</th>
            <th>telephone</th>
            <th>address</th>
            <th>member</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>

      
        
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>



            <tr>
                <td><?php echo $row['customers_id']; ?></td>
                <td><?php echo $row['cus_first_name']; ?></td>
                <td><?php echo $row['cus_last_name']; ?></td>
                <td><?php echo $row['telephone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['member_name']; ?></td>
                <td><div class="add"><a href="edit_cus.php?id=<?php echo$row['customers_id'];?>">Edit</a></div></td>
            </tr>




        <?php } ?>
        </tbody>
          
    
    

</div>
</main>
</body>

</html>