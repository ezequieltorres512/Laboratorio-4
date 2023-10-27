<?php
include_once("funciones.php");
if($_POST['origen']){
    ?>
    <pre>
    <?print_r($_POST);
    ?>    
    </pre>
    <?
}else{
    $res = getReservas();
    print_r($res);
}

?>