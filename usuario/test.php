<?php
//phpinfo();
$conn = mysqli_connect("localhost","root","","labo4");
if(!$conn) die("No hay conexion: ".mysqli_connect_error());
else echo "Conexion correcta!!".PHP_EOL;
echo "Inicio de test1".PHP_EOL;
?>