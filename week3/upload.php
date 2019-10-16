<?php
$message = 'file couldn\'t be uploaded';
require_once 'config.php';
include_once 'functions.php';

if(isset($_POST["submit"])){
    $_FILES['']
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
