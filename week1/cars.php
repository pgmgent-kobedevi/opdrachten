<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars</title>
</head>
<body>
    <?php
        require_once "data.php";

        function carBlock($brand, $type, $fuel, $price, $image){
            ?>
                <section class="car_card" style="display:flex; box-sizing:border-box; border:1px solid black; ">
                <img style="width:10vw;" src="img/<?php echo $image ?>" alt="<?php echo $brand . ' ' . $type ?>">
                <ul>
                    <li>Brand: <?php echo $brand ?></li>
                    <li>type: <?php echo $type ?></li>
                    <li>fuel: <?php echo $fuel ?></li>
                    <li>price_form: <?php echo $price ?></li>
                </ul>
            </section>

        <?php

        }

        foreach ($cars as $car) {
            carBlock($car['brand'], $car['type'], $car['fuel'], $car['price_from'], $car['image']);
        }
        ?>
</body>
</html>