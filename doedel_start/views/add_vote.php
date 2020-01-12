<?php

require_once '../models/Doedel.php';

echo $_POST['name'] . ' ';
echo $_POST['email'];
echo $_POST['code'];
print_r($_POST['dates']);

Doedel::add_votes($_GET['doedel_code'], $_POST['name'], $_POST['email'], $_POST['dates']);

?>