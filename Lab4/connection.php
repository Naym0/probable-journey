<?php 
    $mysqli = new mysqli("localhost", "root", "Admin", "rest");

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
?>