<?php 
include 'app.php';

$selected_tag = $_GET['tag'] ?? 0;

$messages = Message::all($selected_tag);
$tags = Tag::all();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section>
    <h1>NMD Overflow</h1>
<form method="POST" action="add_message.php">
<label>
        Wat is uw user id<br>
        <input type="text" name="user_id" >
    </label>    <br>
<label>
        Message<br>
        <textarea name="message" rows="5"></textarea>
    </label><br>
    <label>
        Welke tag ids ?<br>
        <input type="text" name="tags" >
    </label>    <br>
    <button type="submit">Verstuur</button>
</form>

<hr>


    <?php echo getTagList($tags, $selected_tag); ?>

    <?php echo getMessageOverview($messages); ?>
    </section>
</body>
</html>