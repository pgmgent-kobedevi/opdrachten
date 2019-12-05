<?php

$dsn = 'mysql:dbname=arteair;host=127.0.0.1;port=3307';
$user = 'root';
$password = '';

//let's try to make a connection
$db = new PDO($dsn, $user, $password);
//now let's turn on error messages and warnings
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$query = "S";

//check if theres a get variable
if(isset($_GET['flight_id'])){
    $flight_id = $_GET['flight_id'];
    //query to delete from db
    $query = "SELECT * FROM flight WHERE flight_id = $flight_id";
    $query2 = "SELECT airport_code, `name` as airport_name FROM airport";
}
else {
}

//preventing sql injection
$sth = $db->prepare($query);
$sth->execute([

]);

$results = $sth->fetchAll();
foreach ($results as $result) { }

$sth = $db->prepare($query2);
$sth->execute([

]);

$results2 = $sth->fetchAll();
?>


<?php 
if(isset($_POST["submit"])) {
    
    $query = "UPDATE flight SET flight_date = {$_POST['flight_date']} WHERE flight_id = {$_GET['flight_id']}";

}

$sth = $db->prepare($query);
$sth->execute([

]);

?>





<!-- edit field -->

<form method="post" enctype="multipart/form-data">
    <input name="flight_date" type="text" placeholder="<?php echo $result['flight_date']; ?>">
    <select name="from">
        <?php
            foreach ($results2 as $airport_name) {
                $option = $airport_name['airport_code'] . ' - ' . $airport_name['airport_name'] . "<br/>";
                ?><option value="<?php echo $option ?>"><?php echo $option ?></option><?php
            }
        ?>
    </select>
    <select name="to">
        <?php
            foreach ($results2 as $airport_name) {
                $option = $airport_name['airport_code'] . ' - ' . $airport_name['airport_name'] . "<br/>";
                ?><option value="<?php echo $option ?>"><?php echo $option ?></option><?php
            }
        ?>
    </select>
    <button name="submit">Edit</button>
</form>

<?php

// close connection
$db = null;
?>