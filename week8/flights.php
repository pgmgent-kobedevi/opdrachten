<?php

$dsn = 'mysql:dbname=arteair;host=127.0.0.1;port=3307';
$user = 'root';
$password = '';

// Verbinding maken met de database via een nieuwe PDO.
$db = new PDO($dsn, $user, $password);
// Foutmeldingen aanzetten
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$sql = "SELECT flight.flight_id, flight.flight_date, a_f.airport_code as 'departure', a_f.`location` as 'departure_city', a_t.airport_code as 'arrival', a_t.`location` as 'arrival_city',  flight.aircraft_id,  aircraft.aircraft_code
FROM flight
INNER JOIN airport a_f ON flight.from = a_f.airport_id
INNER JOIN airport a_t ON flight.to = a_t.airport_id
INNER JOIN aircraft ON flight.aircraft_id = aircraft.aircraft_id
ORDER BY flight_date ASC";

$sth = $db->prepare($sql);
$sth->execute([
    
]);

$flights = $sth->fetchAll();

//sluit connectie
$db = null;
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ArteAir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ArteAir</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/week07/arteair/flights.php">Flights</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <h1>Flights</h1>

    <table class="table">
        <tr>
            <th>id</th>
            <th>Date</th>
            <th>From</th>
            <th>To</th>
            <th>Aircraft</th>
            <th></th>
        </tr>
        <?php foreach ( $flights as $flight ) : ?>
        <tr>
            <td><?php echo $flight['flight_id']; ?></td>
            <td><?php echo $flight['flight_date']; ?></td>
            <td><?php echo $flight['departure']; ?> <small>(<?php echo $flight['departure_city']; ?>)</small></td>
            <td><?php echo $flight['arrival']; ?> <small>(<?php echo $flight['arrival_city']; ?>)</small></td>
            <td><?php echo $flight['aircraft_code']; ?></td>
            <td>
            <a href="orders.php?flight_id=<?php echo $flight['flight_id']; ?>" class="btn btn-primary btn-sm">Orders</a>
            <a href="edit.php?flight_id=<?php echo $flight['flight_id']; ?>" class="btn btn-secondary btn-sm">Edit</a>
            <a href="remove.php?flight_id=<?php echo $flight['flight_id']; ?>" class="btn btn-secondary btn-sm">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
