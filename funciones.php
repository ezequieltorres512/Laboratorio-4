<?php
function setReserva(){
    include_once("conexion.php");
    $sql = "INSERT INTO reserva (cuil, fecha_inicio, fecha_fin, habitacion, adicional, vendedor) VALUES 
            (20402346176, '2023-10-02', '2023-10-12', 99, 99, 2)";
    $res = mysqli_query($conn, $sql);
    if($res) return "OK";
    else return "ERROR";
}
$respuesta = setReserva();
echo $respuesta."\n";
?>