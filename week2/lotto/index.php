<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lotto</title>
</head>
<body>
    <?php
        $_SESSION["numbers"] = array();
        $new = rand(1,45);
        if(count($_SESSION["numbers"]) <6){
            array_push($_SESSION["numbers"], $new);
        }
        else{
            array_shift($_SESSION["numbers"]);
            array_push($_SESSION["numbers"], $new);
        }
        print_r($_SESSION["numbers"]);
    ?> 
</body>
</html>


































<?php

    // $_SESSION['numbers'] = array();
    // $new = rand(1,45);
    // if(count($_SESSION['numbers']) <= 6){
    //     array_push($numbers, $new);
    // }
    // else{
    //     array_shift($numbers);
    //     array_push($numbers, $new);
    // }
    // echo $numbers[0] .'<br>';

    // for ($i = 0; $i < count($numbers); $i++){

    // }
?>