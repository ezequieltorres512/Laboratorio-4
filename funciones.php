<?php
function setReserva(){
    include_once("conexion.php");
    $sql = "INSERT INTO reserva (cuil, fecha_inicio, fecha_fin, habitacion, servicio, vendedor) VALUES 
            (20402346176, '2023-10-02', '2023-10-12', 2, 3, 1)";
    $res = mysqli_query($conn, $sql);
    if($res) return "OK";
    else return "ERROR";
}
?>