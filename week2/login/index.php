<?php
    session_start();
    if(@$_SESSION['loggedin'] == true){
        header("location: admin.php"); 
    }
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
    <form action="" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
    if(isset($_POST['submit']) && $_POST['name']!= '' && $_POST['password']!= ''){
        if($_POST['name'] == 'nmd' && $_POST['password'] == 'admin'){
            $_SESSION["loggedin"] = true;
            header("location: admin.php");
        }
        else{
            echo "that is not the correct log in creddential";
        }
    }
    ?>
</body>
</html>