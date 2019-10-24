<?php
    if(isset($_COOKIE['user'])){
        header("location: hallo.php");
    }
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wie?</title>
</head>
<body>
    <form action="hallo.php" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>





































<!-- 
if (isset($_COOKIE['user'])){
        header('location: hallo.php');
        // if cookie user exists, redirect to hallo.php
        exit;
    } -->