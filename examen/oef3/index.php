<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instagram</title>
    <link href="https://fonts.googleapis.com/css?family=Dosis:300|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.5.0/css/light.css" integrity="sha384-33RmjeesW9BZ4wR2Gm3n4iBXOvGTto4znqL2kZleiRanWDxM59IHIq5RsbRioqxb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-srL3Qh9R/n855m4o5fegS//B2q0R1md7z6ndDYaPj8iEp0j0IuKdFVWMY0JosKPF" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h1>Instagram</h1>
    <div class="photos">
        <?php
            require_once 'data.php';
            /* 
            Gebruik de lijst met foto's die je kan inladen via data.php. 
            Maak onderstaande item dynamisch aan de hand van deze lijst.
            Doe een output van de 3 items aan de hand van onderstaande HTML, 
            die je uiteraard invult met de juiste waarden.
            Herhaal deze opdracht 3x, telkens met een andere soort loop.
            */

            // 1
            foreach ($photos as $photo) {
                $photo = (object) $photo;
                ?>
            
                <div class="photo">
                    <img src="images/<?php echo $photo->image ?>">
                    <div class="info">
                        <h2><?php echo $photo->user ?></h2>
                        <span><?php echo date('l, j F Y G:i', strtotime($photo->date)) ?></span>
                        <span><i class="fal fa-comment"></i> <?php echo $photo->comments ?> <i class="fal fa-thumbs-up"></i> <?php echo $photo->likes ?></span>
                    </div>
                </div>

                <?php
            }

            // 2
            for ($i=0; $i < count($photos); $i++) { 
                $photo = (object) $photos[$i];
                ?>
            
                <div class="photo">
                    <img src="images/<?php echo $photo->image ?>">
                    <div class="info">
                        <h2><?php echo $photo->user ?></h2>
                        <span><?php echo date('l, j F Y G:i', strtotime($photo->date)) ?></span>
                        <span><i class="fal fa-comment"></i> <?php echo $photo->comments ?> <i class="fal fa-thumbs-up"></i> <?php echo $photo->likes ?></span>
                    </div>
                </div>

                <?php
            }

            // 3
            $a=0;
            while ($a < count($photos)) {
                $photo = (object) $photos[$a];
                ?>
            
                <div class="photo">
                    <img src="images/<?php echo $photo->image ?>">
                    <div class="info">
                        <h2><?php echo $photo->user ?></h2>
                        <span><?php echo date('l, j F Y G:i', strtotime($photo->date)) ?></span>
                        <span><i class="fal fa-comment"></i> <?php echo $photo->comments ?> <i class="fal fa-thumbs-up"></i> <?php echo $photo->likes ?></span>
                    </div>
                </div>

                <?php
                $a++;
            }

        ?>
            <!-- <div class="photo">
                <img src="images/mercedes-gla.jpg">
                <div class="info">
                    <h2>Dieter De Weirdt</h2>
                    <span>Tuesday, 2 January 2018 15:01</span>
                    <span><i class="fal fa-comment"></i> 4 <i class="fal fa-thumbs-up"></i> 45</span>
                </div>
            </div> -->
        
    </div>
</body>
</html>