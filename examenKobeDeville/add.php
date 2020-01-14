<?php
    require_once 'app.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixels</title>
    <link rel="stylesheet" href="fontello/css/fontello.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <?php include_once 'views/navigatie.php'; ?>
    </header>
    <section class="form" >
        <h1>Voeg een foto toe</h1>
        <?php 
            // add photo
            if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {   
                $file_name = $_FILES['photo']["name"];
                // check if photo is of valid type  
                if (in_array(pathinfo($file_name, PATHINFO_EXTENSION), SAFE_EXTENSIONS)) {
                    $tmp_location = $_FILES['photo']["tmp_name"];
                    $new_location = "images/" . $file_name;             
                    move_uploaded_file($tmp_location, $new_location);
                    $title = $_POST['title'];
                    if(!$_POST['title']){
                        $title = 'Default title';
                    }
                    // add post to db
                    Pixels::add($_SESSION['loginid'], $file_name, $title);
                    // redirect to my photos
                    header("location: index.php?user_id=" . $_SESSION['loginid']);
                }
                else {
                    echo "<h3>that file type is not allowed!</h3>";
                }
            }
        ?>
        <form enctype="multipart/form-data" method="post">
            <div class="form-input">
                <label>Foto</label>
                <input name="photo" type="file" required>
            </div>
            <div class="form-input">
                <label>Titel</label>
                <input name="title" type="text">
            </div>
            <div class="form-input">
                <label></label>
                <input name="submit" type="submit" value="Voeg toe">
            </div>
        </form>
    </section>
</body>
</html>