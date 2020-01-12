<?php
require_once 'app.php';

if(isset($_POST['name'])) {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $dates = $_POST['dates'] ?? [];

    $doedel_code = Doedel::add($name, $description, $dates);
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doedel maken</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
<div class="container">
    <?php if(isset($doedel_code)) : ?>
        <h2>Doedel aangemaakt</h2>
        Je code is : <a href="index.php?doedel_code=<?php echo $doedel_code; ?>"><?php echo $doedel_code; ?></a>
    <?php  else :?>
    <form method="post">
        <h2>Maak een nieuwe Doedel</h2>
        <div class="input-field">    
            <input type="text" name="name" id="name" class="validate">
            <label for="name">Naam</label>
        </div>
        <div class="input-field">    
            <input type="text" name="description" id="description" class="validate">
            <label for="description">Omschrijving</label>
        </div>
        <h5>Kies uw datums</h5>
        <p>&nbsp;</p>
        <div class="input-field">    
            <input type="text" name="dates[]" id="date1" class="datepicker">
            <label for="date1">Datum 1</label>
        </div>
        <div class="input-field">    
            <input type="text" name="dates[]" id="date2" class="datepicker">
            <label for="date2">Datum 2</label>
        </div>
        <div class="input-field">    
            <input type="text" name="dates[]" id="date3" class="datepicker">
            <label for="date3">Datum 3</label>
        </div>
        <div class="input-field">    
            <input type="text" name="dates[]" id="date4" class="datepicker">
            <label for="date4">Datum 4</label>
        </div>
        <div class="input-field">    
            <input type="text" name="dates[]" id="date5" class="datepicker">
            <label for="date5">Datum 5</label>
        </div>
        <p>
            <button type="submit" class="waves-effect indigo darken-1 btn-large">Voeg toe</button>
        </p>
    </form>
    <?php endif;?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    var options = {
            defaultDate: new Date(),
            setDefaultDate: true,
            firstDay: 1
        };
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, options);
        
  </script>
</div>
</body>
</html>