<?php
session_start();
include_once("conexion.php");
$id = $_POST["reservas"];
$query = mysqli_query($conn," UPDATE reserva SET baja ='1' WHERE reserva.id_reserva= $id");
if($query){
    //  header("Location: inicio.php");
      require("redireccion_mensaje.php");
}else{
      echo mysqli_error($conn);
}

?>