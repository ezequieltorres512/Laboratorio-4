<?php
session_start();
include_once("../conexion.php");
//    echo "<br>";
//echo "<br>";
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
    preg_match('/\d+/', $_POST['precio'], $matches);
    $precio = $matches[0];
    $sql = "UPDATE reserva SET fecha_inicio = '".$_POST['fInicioI']."', fecha_fin = '".$_POST['fFinI']."', tipoHabitacion = ".$_POST['tipoH'].", precio = $precio WHERE id_reserva = ".$_POST['id_seleccionado'];
 //   //$res = mysqli_query($conn, $sql);
   // echo "-----\n$sql\n";
   // echo "<pre>";
    //    print_r($_SESSION);
     //   echo "</pre>";
    $query = mysqli_query($conn,$sql);                                           
    if($query){
            require("../mensajes/redireccion_mensaje.php");
    }else{
            echo mysqli_error($conn);
    }
?>