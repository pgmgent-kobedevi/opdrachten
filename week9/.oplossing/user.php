<?php
require_once 'app.php';

//user id uit de querystring halen
$user_id = 0;
if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}
// of veel korter
$user_id = $_GET['user_id'] ?? 0;

$user = User::getById($user_id);

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
    <?php  outputUser($user); ?>
</body>
</html>