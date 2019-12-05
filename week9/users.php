<?php

include 'app.php';
$selected_tag = $_GET['tag'] ?? 0;
// if user is not defined return to home
$selected_user = $_GET['user'] ?? header('location:index.php');
$user = Message::byUser($selected_user, $selected_tag);
$tags = Tag::tagList();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>GDM messages - users</title>
</head>
<body>
    <section>
    <?php
        echo tagOverview($tags,$selected_tag);
        echo messageOverview($user);
    ?>
    <a href="index.php">Go back</a>
    </section>
</body>
</html>