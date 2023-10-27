<?php
session_start();
if($_POST['llegada']){
    print_r($_POST['origen'] == 8);
    if (true) {
        $sql = "UPDATE reserva SET fecha_inicio = '".$_POST['llegada']."', fecha_fin = '".$_POST['salida']."', tipoHabitacion = ".$_POST['tipoH']." WHERE id_reserva = 6";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($conn, $res);
        echo $_SESSION['user']."-----\n$sql\n";
        //header("Location: confirmacion.html");
    }else{
        header("Location: menu2.html");
    }
}else{
    include_once("funciones.php");
    $res = getReservas();
    print_r($res);
}
?>