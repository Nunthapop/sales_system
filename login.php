<?php
include_once "config.php";
session_start();
?>
<?php if (isset($_SESSION['plz-login'])) {
    echo $_SESSION['plz-login'];
    unset($_SESSION['plz-login']);
    }?>

<html>
    
    <head>
<title>Login</title>
<link rel="stylesheet" href="css/loginn.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Space+Grotesk:wght@300;400&display=swap" rel="stylesheet"> 
    </head>
    <form action="checklogin.php" method="post">
    <body>
        <div class="main-grid">
            <div class="pic"> <a href="homepage.php"><img src="image/home.png" class="home"><div class="text">HOME</div></a>
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" alt=""></div>
        <div class="login">
            <p>Welcome To the community✳!</p>
            <h1>Login</h1>
            <?php if (isset($_SESSION['error_msg1'])) {
    echo '<h3 class="error">'.$_SESSION['error_msg1'].'</h3>';
    unset($_SESSION['error_msg1']);
    }?>
            <div class="input">
                <label for="">USERNAME</label>
                <input type="text" id="username" name="username" >
            </div>
            <div class="input">
                <label for="">PASSWORD</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="LOGIN NOW">
            <div class="forget"> Not a member yet?<a href="register.php"> Register now</a></div>
            </div>
            <div class="footer">
                OTOP COLLECTIONⓇ
            </div>
            
            
        </div>
        </div>

    </body>
</form>
</html>