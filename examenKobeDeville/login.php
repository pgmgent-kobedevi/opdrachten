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
        <?php include_once 'views/navigatie.php'?>        
    </header>
    <section class="form">

    <?php
        if(isset($_POST['submit'])){
            // check credentials
            $login = Pixels::login($_POST['mail'], $_POST['password']);
            // if the returned value has a mail that equals the user input
            if($login->email == $_POST['mail']){
                // set session values
                $_SESSION["loginmail"] = $_POST['mail'];
                $_SESSION["loginid"] = $login->user_id;
                header("location: index.php");
            }
            else{
                echo "<h3>wrong username or password</h3>";
            }
        }
    ?>
        <h1>Inloggen</h1>
        <form method="post">
            <div class="form-input">
                <label>Email</label>
                <input name="mail" type="text">
            </div>
            <div class="form-input">
                <label>Wachtwoord</label>
                <input name="password" type="password">
            </div>
            <div class="form-input">
                <label></label>
                <input type="submit" name="submit" value="Inloggen">
            </div>
        </form>
    </section>
</body>
</html>