<?php
    session_start();
    require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel</title>
</head>
<body>
    <?php
        if(@$_SESSION["loggedIn"]){
            if(isset($_POST["submit"])){
                file_put_contents($folder.$_POST['pageName'].'.html', $_POST['content']);
                echo "file created";
            }
            ?>
            <form action="" method="post">
                <input type="text" name="pageName" placeholder="PageName">
                <textarea name="content"></textarea>
                <input name="submit" type="submit" value="Make Page">
            </form>
            
            <?php
            echo "<a href='index.php'>Return to home</a>";
        }
    ?>
</body>
</html>