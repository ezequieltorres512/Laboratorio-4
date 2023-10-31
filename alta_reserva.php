<?php
session_start();
include_once("conexion.php");
//echo "<pre>";
//print_r($_POST);echo "</pre>";

$llegada = $_POST["llegada"];
$salida = $_POST["salida"];
$tipo_habitacion = $_POST["tipoH"];
$canal = $_POST["canal_difusion"];
$adicional = 0;
$vendedor=0;
$query = mysqli_query($conn,"INSERT INTO reserva ( fecha_inicio, fecha_fin, tipoHabitacion, adicional,vendedor, conocidosPor) VALUES ('$llegada','$salida',$tipo_habitacion,$adicional,$vendedor,$canal)");
if($query){
    //  header("Location: menu2.php");

      require("redireccion_mensaje.php");
}else{
      echo mysqli_error($conn);
}


?>