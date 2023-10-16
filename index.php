<?php
include_once("conexion.php");

$res = mysqli_query($conn, "select * from personas");
$row = mysqli_fetch_row($res);
print_r($row);?>
<h1>HOLA</h1>