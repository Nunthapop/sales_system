<?php include "../header/nav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="add_check.php" method="post">
        <h2>Add product</h2>
        <h2>Customer</h2>
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="fname"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lname"></td>
            </tr>
            <tr>
                <td>Telephone</td>
                <td><input type="text" name="tele"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address"></td>
            </tr>
        </table><br>
        <h2>Product</h2>
        <table>
            <tr>
                <td>Product name:</td>
                <td><select name="name">
                        <option value="warm hug">warm hug</option>
                        <option value="Raindrops">Raindrops</option>
                        <option value="Malibu night">Malibu night</option>
                        <option value="Chiang mai">Chiang mai</option>
                        <option value="La vie en rose">La vie en rose</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Quantity:</td>
                <td> <input type="text" name="qty"></td>
            </tr>
            <tr>
                <td> type</td>
                <td> <input type="radio" name="type">Paraffin wax <input type="radio" name="type">Soy wax
                    <input type="radio" name="type">Coconut wax<br>
                    <input type="radio" name="type">Bees wax <input type="radio" name="type">Jasmin rice wax
                </td>
            </tr>
            <tr>
                <td><input type="date" name="date>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button>Add</button></td>
            </tr>
        </table>

    </form>


</body>

</html>
<?php

?>