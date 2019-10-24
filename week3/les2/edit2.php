<?php
    $page = $_GET['page'];
    $currentcontent = file_get_contents("content/$page");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit <?php echo $page ?></title>
</head>
<body>

    <?php
        if(isset($_POST['submit'])){
            file_put_contents('content/'.$page, $_POST['edited']);
            echo "<p>Changes published!</p>";
            $currentcontent = $_POST['edited'];
        }
    ?>

    <?php echo "<h1>Editing $page</h1>" ?>
    <form action="" method="post">
        <textarea style ="width:40vw; height:20vh; "name="edited">
            <?php echo $currentcontent ?>
        </textarea>
        <input type="submit" value="edit page!" name="submit">
        <a href="index2.php?page=<?php echo $page ?>">Return home</a>
    </form>

    <h3>Preview page:</h3>
    <div style="border:2px solid black; border-radius:4px; overflow:auto; width:80vw; height:40vh;">
        <?php
            echo file_get_contents('content/'.$page);
        ?>
    </div>
</body>
</html>