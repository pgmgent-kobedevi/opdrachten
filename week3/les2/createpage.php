<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create new page</title>
</head>
<body>

    <?php
        if(isset($_POST['submit'])){
            file_put_contents('content/'.$_POST['title'].'.html', $_POST['content']);
            echo "<p>page created!</p>";
            $currentcontent = $_POST['content'];
            $hide = 'style="display:none"';
        }

        if(!isset($currentcontent)){
            $currentcontent = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
            </head>
            <body>
                
            </body>
            </html>
            ';
        }
    ?>

    <h1>Creating new page</h1>
    <form action="" <?php echo $hide?> method="post">
        <input type="text" name="title">
        <textarea style ="width:40vw; height:20vh;" name="content">
            <?php echo $currentcontent ?>
        </textarea>
        <input type="submit" value="create page!" name="submit">
    </form>

    <a href="index2.php">Return home</a>

    <h3>Preview page:</h3>
    <div style="border:2px solid black; border-radius:4px; overflow:auto; width:80vw; height:40vh;">
        <?php
            echo @file_get_contents('content/'.$_POST['title'].'.html');
        ?>
    </div>
</body>
</html>