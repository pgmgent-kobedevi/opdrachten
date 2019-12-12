<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="main.css">

</head>
<body>
<?php include 'partials/header.php'; ?>

<section>
    <?php
        require_once 'db.php';
        setlocale(LC_ALL, 'NL_nl');


        $flight_id = 1;
        if(isset($_GET['flight_id'])){
            $flight_id = $_GET['flight_id'];
        }
        
        $sql = 'SELECT flight.*, aircraft.*,  a1.name as from_name, a1.airport_code as from_code, a2.name as to_name, a2.airport_code as to_code
        FROM flight 
        INNER JOIN aircraft ON flight.aircraft_id = aircraft.aircraft_id
        INNER JOIN airport a1 ON flight.from = a1.airport_id
        INNER JOIN airport a2 ON flight.to = a2.airport_id
        WHERE flight.flight_id = :flight_id';

        $sth = $db->prepare($sql);
        $sth->execute([':flight_id' => $flight_id]);
        $flight = $sth->fetchObject();

        
        $sql = 'SELECT seat
                FROM order_detail 
                WHERE order_detail.flight_id = :flight_id';

        $sth = $db->prepare($sql);
        $sth->execute([':flight_id' => $flight_id]);
        $ordered_seats = $sth->fetchAll(PDO::FETCH_COLUMN, 0); //enkel de eerste kolom ophalen hierdoor krijg ik een gewone array
        
    ?>

<h1><?php echo $flight->from_name . ' ' . $flight->to_name ?></h1>
<h3><?php 
        $date = new DateTime($flight->date);
        echo $date->format('l j F Y H:i');
            ?></h3>
        <p><?php echo "Eu ". $flight->ticket_price ?> &bull; <?php echo $flight->aircraft_code ?> &bull; <?php echo $flight->model ?></p>
<form method="POST" action="place_order.php">
<div class="order_form">
    <div class="seats">
        <?php 
        for($row = 1; $row <= $flight->rows; $row++) {
            echo '<div class="row"><span>' . $row . '</span>';
            $seats = str_split($flight->row_layout);
            foreach($seats as $seat) {
                $seat_ref = str_pad($row, 2, "0", STR_PAD_LEFT) . $seat;
                if($seat == '_'){
                    echo '<div class="spacer"></div>';
                }else {
                    if(in_array($seat_ref, $ordered_seats)) {
                        echo '<div class="seat seat-ordered">' . $seat . '</div>';
                    } else {
                        echo '<div class="seat">' . $seat . '<input type="checkbox" name="seat[]" value="' . $seat_ref .'"></div>';
                    }
                }
            }
            echo '</div>';
        }
        ?>
    </div>
    <div class="form">
        Uw voornaam:   <input type="text" name="firstname" >  <br>
        Uw naam:   <input type="text" name="lastname">  <br>
        Uw e-mail:   <input type="text" name="email" >  <br>
        <input type="hidden" name="flight_id" value="<?php echo $flight_id; ?>">
        <button type="submit">Bestelling afwerken</button>
    </div>                        
    </div>  
</form>
</section>
</body>
</html>