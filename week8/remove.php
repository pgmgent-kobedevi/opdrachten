<?php

$dsn = 'mysql:dbname=arteair;host=127.0.0.1;port=3307';
$user = 'root';
$password = '';

//let's try to make a connection
$db = new PDO($dsn, $user, $password);
//now let's turn on error messages and warnings
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$query = "SELECT * FROM flight LIMIT 10";

//check if theres a get variable
if(isset($_GET['flight_id'])){
    $flight_id = $_GET['flight_id'];
    //query to delete from db
    $query = "DELETE FROM flight WHERE flight_id = $flight_id";
}
else {
    header('location: flights.php');
}

//preventing sql injection
$sth = $db->prepare($query);
$sth->execute([

]);

// close connection
$db = null

// redirect to overview
header('location: flights.php');

?>