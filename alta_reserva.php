<?php
session_start();
include_once("conexion.php");
//echo "<pre>";
//print_r($_POST);
//print_r($_SESSION);
//echo "</pre>";

$llegada = $_POST["llegada"];
$salida = $_POST["salida"];
$tipo_habitacion = $_POST["tipoH"];
$canal = $_POST["canal_difusion"];
$precio = substr($_POST["precio"],1,strlen($_POST['precio']));
$id_usuario = $_SESSION['usuario'];
$adicional = 0;
$vendedor=0;
$query = mysqli_query($conn,"INSERT INTO reserva (precio,id_usuario,fecha_inicio, fecha_fin, tipoHabitacion, adicional,vendedor, conocidosPor) VALUES 
                                                ($precio,$id_usuario,'$llegada','$salida',$tipo_habitacion,$adicional,$vendedor,$canal)");
if($query){
    //  header("Location: menu2.php");
      require("redireccion_mensaje.php");
}else{
      echo mysqli_error($conn);
}


?>