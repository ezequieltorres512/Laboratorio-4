<?php
session_start();
include_once("../conexion.php");
//echo "<pre>";
//print_r($_POST);
//print_r($_SESSION);
//echo "</pre>";
$apellido = $_POST["ape"];
$nombre = $_POST["nom"];
$correo = $_POST["correo"];
$tel = $_POST["tel"];
$llegada = $_POST["llegada"];
$salida = $_POST["salida"];
$tipo_habitacion = $_POST["tipoH"];
$canal = $_POST["canal_difusion"];
$precio = substr($_POST["precio"],1,strlen($_POST['precio']));
$id_empleado = "NULL";
$id_usuario = "NULL";

if($_SESSION['tipoUser'] != "cliente"){
      $id_empleado = $_SESSION['usuario'];
}else{
      $id_usuario = $_SESSION['usuario'];
}

$adicional = 0;
$vendedor=0;   

//echo "<pre>"; 
//print_r($_SESSION);  echo "</pre>";

//exit();



$query = mysqli_query($conn,"INSERT INTO reserva (precio,id_usuario,id_empleado, apellido, nombre, telefono, correo,fecha_inicio, fecha_fin, tipoHabitacion, adicional,vendedor, conocidosPor) VALUES 
                                                ($precio,$id_usuario, $id_empleado,'$apellido','$nombre',$tel,'$correo','$llegada','$salida',$tipo_habitacion,$adicional,$vendedor,$canal)");
if($query){
    //  header("Location: inicio.php");

      require("../mensajes/redireccion_mensaje.php");
}else{
      echo mysqli_error($conn);
}


?>