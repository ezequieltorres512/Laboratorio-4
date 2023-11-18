<?php
session_start();
include_once("../conexion.php");
//  echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";

    preg_match('/\d+/', $_POST['precio'], $matches);
    $precio = $matches[0];
    $sql = "UPDATE reserva SET fecha_inicio = '".$_POST['fInicioI']."', fecha_fin = '".$_POST['fFinI']."', tipoHabitacion = ".$_POST['tipoH'].", precio = $precio WHERE id_reserva = ".$_POST['id_seleccionado'];
    $sql = "UPDATE reserva SET";
    $sql .= (isset($_POST['fInicioI']) && $_POST['fInicioI'] != '')? " fecha_inicio = '".$_POST['fInicioI']."', ": "";
    $sql .= (isset($_POST['fFinI']) && $_POST['fFinI'] != '')? " fecha_fin = '".$_POST['fFinI']."', ": "";
    $sql .= (isset($_POST['tipoH']) && $_POST['tipoH'] != '')? " tipoHabitacion = ".$_POST['tipoH'].", precio = $precio, ": "";
    $sql .= (isset($_POST['habitacion_asignada']) && $_POST['habitacion_asignada'] != '')? " habitacion = '".$_POST['habitacion_asignada']."', ": "";
    $sql .= (isset($_POST['canal_difusion']) && $_POST['canal_difusion'] != '')? " conocidosPor = ".$_POST['canal_difusion']." ": "";

    $sql .= "WHERE id_reserva = ".$_POST['id_seleccionado'];
    $sql = str_replace(", WHERE", " WHERE", $sql);
    //echo "->$sql";//exit();
    $query = mysqli_query($conn,$sql);
                                               
     if($query){
             require("../mensajes/redireccion_mensaje.php");
     }else{
             echo mysqli_error($conn);
     }
?>