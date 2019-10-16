<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <?php 
        require_once 'config.php';
        $dir_content = preg_grep('/^([^.])/', scandir("content")); 
        ?>
        <nav>
            <ul>
                <?php

                // check if the "querystring" is set and get content from page and display
                if(isset($_GET['page'])){
                    $currentPage = $_GET['page'];
                }else{
                    $currentPage = "";
                }

                // echo links
                foreach($dir_content as $page){
                    if($currentPage == $page){
                        $active = "active";
                    }else {
                        $active = "noactive";
                    }
                    if(!$currentPage){
                        $currentPage = $page;
                    }
                    echo "<li><a class='".$active."' href='?page=".$page."'>".$page."</a></li>";
                }

                ?>
            </ul>
        </nav>
    </header>
    <main>
        <?php
            @$contents = file_get_contents($folder.$currentPage);  
            echo $contents;

            if(@$_SESSION["loggedIn"]){
                ?>
                <a href="edit.php?page=<?php echo $currentPage ?>">Edit page</a>
                <a href="adminPanel.php">Admin Panel</a>
                <?php
            }
        ?>
        
        <a href="login.php">Login</a>
        
    </main>
</body>
</html>
