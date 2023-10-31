<?php
session_start();
include_once("conexion.php");
if($_POST['llegada']){
    //print_r();
    if ($_POST['origen'] == 8) {
        $sql = "UPDATE reserva SET fecha_inicio = '".$_POST['llegada']."', fecha_fin = '".$_POST['salida']."' WHERE id_reserva = 6";
        $res = mysqli_query($conn, $sql);
        //echo $_SESSION['user']."-----\n$sql\n";
        if($res == true) header("Location: confirmacion.html");
    }else{

        header("Location: menu2.php");

    }
}else{
    include_once("funciones.php");
    $res = getReservas();
    print_r($res);
}
?>