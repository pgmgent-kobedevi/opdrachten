<?php
    // set cookie value
    setcookie('user', $_POST['name'], time() + 20, '/');
    
    // '/' means cookie is available on entire website
?>  
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hallo</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['user'])){
            echo '<h1>Hallo, '.$_COOKIE['user']. ' from cookie</h1>';
        }
        else{
            echo '<h1>Hallo, '.$_POST['name'].'</h1>';
        }
    ?>
</body>
</html>
































