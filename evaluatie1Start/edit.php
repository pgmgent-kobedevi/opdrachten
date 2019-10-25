<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit page <?php echo $_GET["page"] ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
        // load data
        $data = json_decode(file_get_contents("data/articles.json"), true);

        if(isset($_POST["submit"])){
            // changing content
            file_put_contents('content/'.$_GET["page"], $_POST['edited']);
            // if title field is empty, dont change it
            if(!empty($_POST['title'])){
                $data[pathinfo($_GET["page"])["filename"]]["title"] = $_POST["title"];
            }
            // changing image
            if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) 
            {
                $file_name = $_FILES['photo']["name"];
                $tmp_location = $_FILES['photo']["tmp_name"];
                $new_location = "images/" . $file_name;                
                move_uploaded_file($tmp_location, $new_location);
                $data[pathinfo($_GET["page"])["filename"]]["photo"] = $_FILES["photo"]["name"];
                $uploaded = 1;
            }

            // store new data
            $newData = json_encode($data);
            file_put_contents('data/articles.json', $newData);
            echo "<p>Changes published!</p>";
        }
        // load new content to textarea on this page
        $page = file_get_contents("content/".$_GET["page"]);
    ?>
    <section>
    <h1>Editing page: <?php echo $data[pathinfo($_GET["page"])["filename"]]["title"];?></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label>
            Titel<br/>
            <input type="text" name="title" placeholder="edit title">
        </label>
        <label>
            foto<br/>
            <?php
                // if an image is uploaded show a preview
                if(isset($uploaded)){
                    echo "<img style='width:100px' src=images/".$data[pathinfo($_GET['page'])['filename']]["photo"] = $file_name."><br>";
                }
            ?>
            <input type="file" name="photo">
        </label>
        <label>
        content<br/>
        <textarea style="height:30vh;" name="edited">
            <?php echo $page ?>
        </textarea>
        </label>
        <button type="submit" name="submit">Edit page</button>
        <a href="index.php" class="btn">Keer terug</a>
    </form>
    </section> 
</body>
</html>