<?php 
include "../header/nav.php";
$id = $_GET['id'];

echo $id;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/product.css">
    <title>Document</title>
</head>

<body>

<form action=" edit_emp_confirm.php?id=<?php echo $id?>" method="post">
    <?php
    
    $query = "SELECT * FROM employee where employee_id = $id";
    $result = mysqli_query($connect, $query); ?>
   <table>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>position</th>
                
                <th>Edit</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

  
<!-- แก้ input type =text, value-->
                <tr>
               
                    <td><?php echo $row['employee_id']; ?></td>
                    <td><input type="text" value="<?php echo $row['emp_name']; ?>" name="emp_name"></td>
                    <td><input type="text" value="<?php echo $row['emp_position']; ?>" name="position"></td>
                    <td><input type="submit" name="submit" value="save" >
                    <input type="reset" name="reset" value="CANCEL">
                </tr> </td>



        <?php } ?>
        </form>
</body>

</html>