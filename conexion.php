<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "labo4";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if(!$conn) die("No hay conexion: ".mysqli_connect_error());
?>