<?php include "../header/nav.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create_emp.css">
    <title>Add Emp</title>
</head>
<body>
<div class="parent-box">
<form action="create_emp_check.php" method="post">

   <div class="name">Employee name: <input type="text" name="name"></div>
   <div class="name">Password: <input type="text" name="pass"></div>
   <div class="position">Employee position <select id="cars" name="position">
    <option value="manager">Manager</option>
    <option value="seller">Seller</option>
 
  </select></div>
   <button> Add</button>
   </form>
</div>
  
</body>
</html>