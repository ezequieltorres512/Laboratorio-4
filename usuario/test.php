<?php
//phpinfo();
// $conn = mysqli_connect("localhost","root","","labo4");
// if(!$conn) die("No hay conexion: ".mysqli_connect_error());
// else echo "Conexion correcta!!<br>";
$mysqli = new mysqli("localhost","root","","labo4");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
}
echo "Inicio de test1".PHP_EOL;
?>