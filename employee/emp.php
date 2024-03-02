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

</head>

<body>
 


    <div class="main">
        <?php
        $query = "SELECT * FROM employee";
        $result = mysqli_query($connect, $query); ?>
        <table>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>position</th>
                
                <th>Edit</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

  

                <tr>
                    <td><?php echo $row['employee_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_position']; ?></td>
                    <td><div class="add"><a href="edit_emp.php?id=<?php echo$row['employee_id'];?>">GET IN</a></div></td>
                </tr>




            <?php } ?>
                    <div><a href="create_emp.php">Create</a></div>

    </div>
</body>

</html>