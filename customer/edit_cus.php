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
    <link rel="stylesheet" href="../css/edit_cus.css">
    <title>edit_cus</title>
</head>

<body>
    <main>
        <div class="parent-box">
            <form action=" edit_cus_confirm.php?id=<?php echo $id ?>" method="post">
                <?php

                $query = "SELECT * FROM customers join membership using (membership_id) where customers_id = $id";
                $result = mysqli_query($connect, $query); ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th>Member</th>
                        <th>Edit</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>


                        <!-- แก้ input type =text, value-->
                        <tr>

                            <td><?php echo $row['customers_id']; ?></td>
                            <td><input type="text" value="<?php echo $row['cus_first_name']; ?>" name="first_n"></td>
                            <td><input type="text" value="<?php echo $row['cus_last_name']; ?>" name="last_n"></td>
                            <td><input type="text" value="<?php echo $row['telephone']; ?>" name="telephone"></td>
                            <td><input type="text" value="<?php echo $row['address']; ?>" name="address"></td>
                            <td><select name="member_name">
                                    <option value="1">Standard</option>
                                    <option value="2">Premium </option>
                                </select></td>
                            <td><input type="submit" name="submit" value="save">
                                <input type="reset" name="reset" value="CANCEL">
                        </tr>
                        </td>



                    <?php } ?>
            </form>
        </div>
    </main>

</body>

</html>