<?php
    if (isset($_COOKIE['user'])){
        header('location: hallo.php');
        // if cookie user exists, redirect to hallo.php
        exit;
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
    <form action="hallo.php" method='post'> <!-- standard method is get-->
        <label for="name">
            <input type="text" name='name' placeholder="hallo?">
        </label>
        <input type="submit" value="submit">
    </form>
</body>
</html>

