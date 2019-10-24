<?php
require_once 'config.php';
include_once 'functions.php';

if(isset($_FILES['my_file']) && $_FILES['my_file']['size'] > 0) 
{
    // gets file name 
    $file_name = $_FILES['my_file']["name"];
    // sets temp storage location
    $tmp_location = $_FILES['my_file']["tmp_name"];
    //where it should end up
    $new_location = UPLOAD_PATH . '/' . $file_name;
    $file_info = pathinfo($file_name);
    $ext = $file_info['extension'];
    if(in_array($ext, SAFE_EXTENSIONS)){
        // move the file to the upload directory
        move_uploaded_file($tmp_location, $new_location);
        header("location: index2.php");
    }
    else{
        $message = 'nope!';
    }
    $message = 'hi';
}
else {
    $message = 'Oeps...';
}
//TODO: upload file. indien ok redirect to index.php. Indien niet geef een goede melding aan de gebruiker.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DarkShare</title>
    <link rel="stylesheet" href="/week03/css/main.css">
</head>
<body>

<h1>DarkShare</h1>

<section>
<?php echo $message; ?>
</section>

</body>
</html>
