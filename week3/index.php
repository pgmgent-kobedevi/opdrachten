<?php 
require_once 'config.php';
include_once 'functions.php';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DarkShare</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<h1>DarkShare</h1>

<section>
    <form action='upload.php' method='post'> <!-- TODO: ga op zoek naar de correcte attributen voor het opladen van bestanden via een form -->
        <input type="file" name="my_file" class="input">
        <input type="submit" value="Share" class="btn" name="submit">
    </form>
</section>
<section class="">
    <h2>Shared files</h2>   
    <div class="filter">
        <form>
            <input type="text" name="q">
            <input type="submit" value="Search" class="btn">
        </form>
        <div class="view_switch">
            <a href="?view=list">list</a>
            <a href="?view=grid">grid</a>
        </div>

    <?php
        // get the 'view variable' from the url
        if(isset($_GET['view'])){
            $view = $_GET['view'];
            setcookie('view', $_GET['view'], time()+ (86400 * 30), '/'); //60s;
        } else if(isset($_COOKIE['view'])){
            $view = $_COOKIE['view'];
        }
    ?>


    </div>
    <div class="file-list <?php echo $view; ?>">
    <?php
        // preg_grep excludes hidden files 
        $dir_content = preg_grep('/^([^.])/', scandir(UPLOAD_PATH));

        foreach($dir_content as $file){
            $extension = pathinfo('./uploads/'. $file);
            if(@$extension['extension'] === NULL) {
                ?>
                <a href="<?php echo UPLOAD_PATH . "/".$file?>"><div class="file">
                    <div class="icon icon-<?php echo $extension['extension']; ?>">
                    <?php     
                        echo '<span> folder </span>';
                    ?> 
                    </div>
                    <div class="file_info">
                        <strong><?php echo $file?></strong><br>
                    </div>
                </div></a>
                <?php
            }
            else {
                // get filesize of files under ./uploads/
                $filesize = filesize('./uploads/'. $file);

                $is_img = in_array($extension['extension'], IMG_EXTENSIONS);
                ?>
                <div class="file">
                    <div class="icon icon-<?php echo $extension['extension']; ?>">
                    <?php     
                    if($is_img){
                        echo '<img src="uploads/'.$file.'">';
                    } else {
                        echo '<span>' . $extension['extension'] . '</span>';
                    }
                    ?> 
                    </div>
                    <div class="file_info">
                        <strong><?php echo $file?></strong><br>
                        <?php echo human_filesize($filesize) ?>
                    </div>
                    <div class="buttons">
                        <!-- <a href="edit.php?file=license.txt" class="btn" download="">Edit</a> -->
                        <a href="<?php echo('./uploads/' .$file)?>" class="btn" download="">Download</a>
                    </div>
                </div>
                <?php
            }            
        }
    ?>
        <!-- TODO: Maak onderstaande lijst dynamisch -->
        
    </div>
    <div class="paging">
        <a href="?page=1" class="current">1</a>
        <a href="?page=2">2</a>
        <a href="?page=3">3</a>
        <a href="?page=4">4</a>
        <a href="?page=5">5</a>
    </div>
</section>

</body>
</html>