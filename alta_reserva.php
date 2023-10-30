<?php
session_start();
include_once("conexion.php");
//echo "<pre>";
//print_r($_POST);echo "</pre>";
$usuario= $_SESSION["id"];
$llegada = $_POST["llegada"];
$salida = $_POST["salida"];
$tipo_habitacion = $_POST["tipo_habitacion"];
$canal = $_POST["canal_difusion"];
$adicional = 0;
$vendedor=0;
$baja=0;
$query = mysqli_query($conn,"INSERT INTO reserva ( id_usuario, fecha_inicio, fecha_fin, tipoHabitacion, adicional,vendedor, conocidosPor,baja) VALUES ($usuario,'$llegada','$salida',$tipo_habitacion,$adicional,$vendedor,$canal,$baja)");
if($query){
    //  header("Location: inicio.php");
      require("redireccion_mensaje.php");
}else{
      echo mysqli_error($conn);
}


?>