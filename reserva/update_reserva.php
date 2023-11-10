<?php
session_start();
include_once("../conexion.php");
    preg_match('/\d+/', $_POST['precio'], $matches);
    $precio = $matches[0];
    $sql = "UPDATE reserva SET fecha_inicio = '".$_POST['llegada']."', fecha_fin = '".$_POST['salida']."', tipoHabitacion = ".$_POST['tipoH'].", precio = $precio WHERE id_reserva = ".$_POST['id_reserva'];
    //echo "$sql<br>";
    //$res = mysqli_query($conn, $sql);
    //echo $_SESSION['user']."-----\n$sql\n";
    $query = mysqli_query($conn,$sql);                                           
    if($query){
            require("../mensajes/redireccion_mensaje.php");
    }else{
            echo mysqli_error($conn);
    }
?>