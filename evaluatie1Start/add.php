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


    <?php 

    $data = json_decode(file_get_contents("data/articles.json"), true);

    if(isset($_POST["submit"])){
        // create unique id for page
        $id = uniqid();
        // store title
        $data[$id]["title"] = $_POST["title"];
        
        // add image
        if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) 
        {
            $file_name = $_FILES['photo']["name"];
            $tmp_location = $_FILES['photo']["tmp_name"];
            $new_location = "images/" . $file_name;                
            move_uploaded_file($tmp_location, $new_location);
            $data[$id]["photo"] = $file_name;
            $uploaded = 1;
        }
        // if no image is uploaded use default image
        else{
            $data[$id]["photo"] = "default.jpg";
        }
        // store this data
        $newData = json_encode($data);
        file_put_contents('content/'.$id.'.html', $_POST['content']);
        file_put_contents('data/articles.json', $newData);
        echo "<p>Changes published!</p>";
    }
    ?>


<section>
    <h1>Bericht toevoegen</h1>    
    <form method="post" enctype="multipart/form-data">
        <label>
            Titel<br>
            <input type="text" name="title" required>
        </label>
        <label>
            Foto<br>
            
            <?php
            // if image is uploaded, show preview
            if(isset($uploaded)){
                echo "<img style='width:100px' src=images/".$data[$id]["photo"] = $file_name."><br>";
            }
            ?>
            <input type="file" name="photo" value="Kies...">
        </label>
        <label>
            Inhoud<br>
            <textarea name="content" rows="15"></textarea>
        </label>
        <button type="submit" name="submit">Toevoegen</button>
        <a href="index.php" class="btn">Keer terug</a>

    </form>



</section>
</body>
</html>
