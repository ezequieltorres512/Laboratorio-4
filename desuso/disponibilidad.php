<?php 
include_once("../conexion.php");
$planes=[];

// $finicio= $_GET['fInicioI'];
// $ffin= $_GET['fFinI'];
// $fhabitacion= $_GET['habitacion'];

$finicio = '2023-12-01';
$ffin = '2023-12-05';
$fhabitacion = 3;

$habitacionesDisponibles = obtenerHabitacionesDisponibles($conn, $fhabitacion);
$reservas = obtenerReservas($conn, $fhabitacion);

foreach ($reservas as $reserva) {
    // Verifica si hay superposición de fechas
    if($reserva['habitacion']){
        if (haySuperposicion($reserva['fecha_inicio'], $reserva['fecha_fin'], $finicio, $ffin)) {
            // Si hay superposición, la habitación está ocupada
            $tipoHabitacionOcupada = $reserva['habitacion'];
            // Remueve la habitación ocupada de la lista de habitaciones disponibles
            $habitacionesDisponibles = quitarHabitacion($habitacionesDisponibles, $tipoHabitacionOcupada);
        }
    }
}
// echo"<pre>";
// print_r($habitacionesDisponibles);
// echo"</pre>";

$cantidad=0;
foreach($habitacionesDisponibles as $disponibles){
    // echo"<pre>";
    // print_r($disponibles);
    // echo"</pre>";
    $objPlan = new stdClass();
    $objPlan->id=$disponibles['id'];
    $objPlan->precio=$disponibles['piso'];
    $objPlan->id_usuario=$disponibles['puerta'];
    array_push($planes,$objPlan);
    $cantidad++;
}
$totalregistros = $cantidad;

$objPlanes = new stdClass(); 
$objPlanes->planes=$planes; 
$objPlanes->cuenta=$totalregistros;
$salidaJson = json_encode($objPlanes);

echo $salidaJson;

function haySuperposicion($inicioReserva, $finReserva, $inicioDeseado, $finDeseado) {
    //echo "<br>$inicioReserva <= $finDeseado && $finReserva >= $inicioDeseado<br>";
    return ($inicioReserva <= $finDeseado && $finReserva >= $inicioDeseado);
}
function obtenerHabitacionesDisponibles($conn, $tipo) {
    $sql = 'select a.id id,a.piso,a.puerta, a.descripcion from habitacion a join tipohabitacion b on a.tipo_habitacion=b.id where tipo_habitacion = '.$tipo;
    $query = mysqli_query($conn, $sql);
    $salida = array();
    while($row = mysqli_fetch_assoc($query)){
        array_push($salida, $row);
    }
    return $salida;
}
function quitarHabitacion($habitaciones, $habitacionOcupada) {
    $array = array(['id' => $habitacionOcupada]);
    foreach ($habitaciones as $key => $habitacion) {
        //echo $habitacion['id']."*".$habitacionOcupada."<br>";
        if ($habitacion['id'] === $habitacionOcupada) {
            unset($habitaciones[$key]);
            break;
        }
    }
    return $habitaciones;
}
function obtenerReservas($conn, $tipo){
    $sql = 'select * from reserva where baja is null and tipoHabitacion = '.$tipo;
    $query = mysqli_query($conn, $sql);
    $salida = array();
    while($row = mysqli_fetch_assoc($query)){
        array_push($salida, $row);
    }
    return $salida;
}