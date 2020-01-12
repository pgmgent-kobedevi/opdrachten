<?php
    require_once 'app.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doedel</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
<div class="container">
<div class="row">

      <div class="col s8">
       
    <?php if(isset($_GET['doedel_code'])) : ?>
        <?php 
            $doedel_code = $_GET['doedel_code'];
            $doedel = Doedel::get_results($doedel_code);
            if(!$doedel->name){
                header('location: index.php');
            }
            include 'views/doedel_info.php';
        ?>
            
    <?php else : ?>
        <h2>Heb je een doedel code ontvangen?</h2>
        <p>Vul hieronder de doedel code in en kies de dagen die voor jou passen...</p>
        <form method="get" action="">
            <p><label>
                Code<br>
                <input type="text" name="doedel_code" required>
            </label></p>
            <p>
                <button type="submit" class="waves-effect waves-light btn-large">Ga naar de doedel</button>
            </p>
        </form>
    <?php endif; ?>
     </div>

    <div class="col s4">

        <h3></h3>
        <a href="create.php" class="btn-large indigo lighten-4">Zelf een doedel maken</a>      </div>

    </div>

</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</body>
</html>