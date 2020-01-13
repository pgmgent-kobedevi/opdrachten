<?php
require_once 'app.php';

if(isset($_POST['submit_form'])) 
{
    /*
    TODO:
    Haal alle data op uit het verzonden formulier en vul de databank in. 
    Nadat alles is opgeslagen dien je de submission_id op te slaan in een cookie.
    Stuur hierna de gebruiker door naar done.php
    Als extra gebruik hier ook de methode van commit en rollback.
    */
    
    $sub_id = Olod::insert($_POST['student_id'], $_POST['olod_id'], $_POST['realstudy'], $_POST['wishcontact'], $_POST['wishstudy']);
    setcookie('sub_id', $sub_id, time() + (86400 * 30), "/"); // 86400 = 1 day
    header("location:done.php?sub_id=".$sub_id);
}
else {
    header("location:index.php");
}