<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
.active{
    color:pink;
}

</style>

<body>
    <?php

        // if page is set
        if(isset($_GET['page'])){
            $currentpage = $_GET['page'];
        }
        else{
            $currentpage = "";
        }
        
        // get all pages
        $content = preg_grep('/^([^.])/', scandir("content"));
        foreach ($content as $page) {
            if(!$currentpage){
                $currentpage = $page;
            }
            if($currentpage == $page){
                $active = "class='active'";
            }
            else{
                $active = "";
            }
            ?>
            <li><a <?php echo $active ?> href="?page=<?php echo $page ?>"><?php echo pathinfo($page)['filename'] ?></a></li>
            <?php
        }

        // echo $currentpage;
        echo file_get_contents('content/'.$currentpage);
    ?>

    <a href="edit2.php?page=<?php echo $currentpage ?>">Edit this page</a>
    <a href="createpage.php">create new page</a>
</body>
</html>