<?php

function outputUser($user){
    $user->initials = substr($user->firstname, 0, 1) . substr($user->lastname, 0, 1);
    include 'views/user_detail.php';
}