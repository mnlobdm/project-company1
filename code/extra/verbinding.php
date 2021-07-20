<?php

$host = "localhost";
$dbGebnaam = "root";
$dbWachtwrd = "";
$dbNaam = "matwente";

$conn = mysqli_connect($host, $dbGebnaam, $dbWachtwrd, $dbNaam);

if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

?>