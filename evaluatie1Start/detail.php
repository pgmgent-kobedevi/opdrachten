<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webdev I Evaluatie 1</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section>
    <?php
        $content = preg_grep('/^([^.])/', scandir("content"));

        // if page is not in content directory redirect
        if(!in_array($_GET['page'], $content)){
            header('location: index.php');            
        }
        // else get content
        elseif(isset($_GET["page"])){
            $page = file_get_contents("content/".$_GET["page"]);
            $data = json_decode(file_get_contents("data/articles.json"), true);
        }
    ?>
    <!-- display content -->
    <h1><?php echo $data[pathinfo($_GET["page"])["filename"]]["title"]; ?></h1>
    <img src="images/<?php echo $data[pathinfo($_GET["page"])["filename"]]["photo"]; ?>">
    <div class="content">
        <?php echo $page ?>
        <a href="edit.php?page=<?php echo $_GET["page"]?>">Bewerk</a>
    </div>    
    <a href="index.php" class="btn">Keer terug</a>
</section>
</body>
</html>
