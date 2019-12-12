<?php
    // require_once "data/articles.json";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batchfile renamer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="articles">
    <?php
        // exclude . and .. files with preg_grep
        $tempcontent = preg_grep('/^([^.])/', scandir("newcontent"));
        $i = 1;
        // count amount of content already in this folder
        foreach ($tempcontent as $test) {
            $i++;
        }
        ?>

        <form method="post">
            <input type="text" name="batchname">
            <input type="submit" name="submit">
        </form>

        <?php
        $content = preg_grep('/^([^.])/', scandir("content"));
        // foreach file that exist create a new one in ./newcontent
        ?>
        <div style="overflow-y:auto; max-height: 25vh; margin: 10px; box-sizing:border-box;">
        <?php
        if(isset($_POST['submit'])) {
            if($_POST['batchname'] == ''){
                $batchname = 'defaultname.';
            }
            $batchname = $_POST['batchname'].'.';
            foreach ($content as $page) {
                // get the content from the file
                $content = file_get_contents("content/".$page);
                // get the extension from the file
                $ext = pathinfo($page,PATHINFO_EXTENSION);
                // save the new file in ./newcontent
                file_put_contents('newcontent/'.$i.$batchname.$ext, $content);
                echo '<p><i>'.$i.$batchname.$ext.'</i><b> File succesfully created</b></p>';
                $i++;
            }
        }
    ?>
    </div>
</div>
</body>
</html>
