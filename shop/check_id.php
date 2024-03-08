<?php  include "../header/nav_cus.php";


$p_id =$_GET['id'];
echo $p_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="show.php?id=<?php echo $p_id;?>&action=add" method="post">
<input type="submit">
</form>
</body>
</html>