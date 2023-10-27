<?php
session_start();
if($_POST['llegada']){
    print_r($_POST['origen'] == 8);
    if (true) {
        echo $_SESSION['user']."-----\n";
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