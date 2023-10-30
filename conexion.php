<?php
$dbHost = "boqabnrvhlsejwww4hty-mysql.services.clever-cloud.com";
$dbUser = "uya9bsrnyguckms9";
$dbPass = "uPPq9dkQyxvMqLdwmi7Y";
$dbName = "boqabnrvhlsejwww4hty";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if(!$conn) die("No hay conexion: ".mysqli_connect_error());
?>