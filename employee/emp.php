<!--For admin-->
<?php
include "../header/nav.php"; ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/emp.css">
   
    <title>Document</title>

</head>

<body>

    <main>
        <div class="parent-box">
            <?php
            $query = "SELECT * FROM employee";
            $result = mysqli_query($connect, $query); ?>
            <h2>Employee</h2>

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
                        <td>
                            <?php if ($_SESSION['emp_level'] == 1){
                                ?> <div class="add"><a href="edit_emp.php?id=<?php echo $row["employee_id"]; ?>"> GET IN </a></div>
                                <?php ;
                               
                            }
                            else{
                                echo $_SESSION["emp_position"];
                            }?>
                           
                        </td>
                    </tr>




                <?php } ?>
            </table>
           <?php  if ($_SESSION['emp_level'] == '1'){
                echo '<div class="create"><a href="create_emp.php">Create</a></div>';
           }?>
            
        </div>
   

    </main>

</body>

</html>