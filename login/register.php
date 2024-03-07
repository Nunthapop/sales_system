<?php
include_once "../config/config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $add = $_POST['address'];
    $password = $_POST['password'];
    $member = 1;
    $_SESSION['first'] = $first;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO customers (cus_first_name, 
    cus_last_name, telephone,address,password, membership_id) VALUES 
    ('$first', '$last', '$tel','$add','$password','$member')";

    if (mysqli_query($connect, $query)) {
        header('Location:../shop/shop.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/register.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Montserrat+Subrayada:wght@400;700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<head>
    <title>Register</title>
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="register">
            <h2>Register</h2>
            <div class="name"> <label for="username">First name</label>
                <input type="text" name="first">
                <label for="username">Last name</label>
                <input type="text" name="last">
            </div>
            <div class="tel"> <label for="email">Telephone:</label>
                <input type="text" id="email" name="tel" required>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>

            <label for="email">Address</label>
            <input type="text" id="email" name="address" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Register">
        </div>

    </form>
</body>

</html>