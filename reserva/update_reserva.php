<?php
session_start();
include_once("../conexion.php");

    $sql = "UPDATE reserva SET fecha_inicio = '".$_POST['llegada']."', fecha_fin = '".$_POST['salida']."' WHERE id_reserva = ".$_POST['id_reserva'];
    $res = mysqli_query($conn, $sql);
    //echo $_SESSION['user']."-----\n$sql\n";
    if($res == true) header("Location: ../inicio.html");

    header("Location: ../inicio.php");
?>