<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            if($_POST['password'] == 'nmd' && $_POST['username'] == 'admin'){
                $_SESSION["loggedIn"] = true;
                header("location: index.php");            
            }
            else{
                echo "kak!, tis ni just";
            }
        }
    ?>
<form action="" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="password"  name="password" placeholder="password">
    <input type="submit" name="submit" value="login">
</form>

</body>
</html>