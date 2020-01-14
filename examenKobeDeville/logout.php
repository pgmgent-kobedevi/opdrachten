<?php
    session_start();
    // destroy session (values)
    session_destroy();
    header("location: index.php");
?>