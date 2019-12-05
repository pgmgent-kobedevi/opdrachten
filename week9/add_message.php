<?php
    include 'app.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GDM messages - add message</title>
</head>
<body>
    <?php
       Message::newMessage($_POST['user_id'], $_POST['message'], splitTag($_POST['tags']));
    ?>
</body>
</html>