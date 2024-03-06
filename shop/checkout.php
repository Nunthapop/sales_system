<?php
include "../header/nav_cus.php";
session_start();
?>
<html>

<head>
</head>

<table border="1">
    <tr>
        <td width="101">ProductID</td>
        <td width="82">ProductName</td>
        <td width="82">Price</td>
        <td width="79">Qty</td>
        <td width="79">Total</td>
    </tr>
    <?php
    $Total = 0;
    $SumTotal = 0;

    for ($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {
        if ($_SESSION["strProductID"][$i] != "") {
            $query = "SELECT * FROM product WHERE product_id = '" . $_SESSION["strProductID"][$i] . "' ";
            $result = mysqli_query($connect, $query);
            $objResult = mysqli_fetch_array($result);
            $Total = $_SESSION["strQty"][$i] * $objResult["product_price"];
            $SumTotal = $SumTotal + $Total;
            ?>
            <tr>
                <td>
                    <?php echo $_SESSION["strProductID"][$i]; ?>
                </td>
                <td>
                    <?php echo $objResult["product_name"]; ?>
                </td>
                <td>
                    <?php echo $objResult["product_price"]; ?>
                </td>
                <td>
                    <?php echo $_SESSION["strQty"][$i]; ?>
                </td>
                <td>
                    <?php echo number_format($Total, 2); ?>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
Sum Total
<?php echo number_format($SumTotal, 2); ?>
<input type="submit" name="submit" value="submit">
</body>

</html>