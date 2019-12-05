<?php

    require_once "model/User.php";

    $user = new User();
    $user = $user->getById(1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        foreach ($user as $userMessage) {
            ?><div>
                <h1><?php echo $userMessage['firstname'] .' '. $userMessage['lastname']?></h1>
                <p><?php echo $userMessage['content']?></p>
            </div>
            <?php
        }
    ?>
    
</body>
</html>