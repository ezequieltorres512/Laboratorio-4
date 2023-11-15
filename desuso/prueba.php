<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "labo4";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if(!$conn) die("No hay conexion: ".mysqli_connect_error());

// Rango de fechas deseado
$fechaInicioDeseada = '2023-12-01';
$fechaFinDeseada = '2023-12-05';

// Obtén la lista de habitaciones disponibles (puedes obtenerla de tu base de datos)
$habitacionesDisponibles = obtenerHabitacionesDisponibles($conn);
echo"<pre>";
print_r($habitacionesDisponibles);
echo"</pre>";
// Obtén la lista de reservas existentes (puedes obtenerla de tu base de datos)
$reservas = obtenerReservas($conn);
// echo"<pre>";
// print_r($reservas);
// echo"</pre>";
// Itera sobre las reservas existentes
foreach ($reservas as $reserva) {
    // Verifica si hay superposición de fechas
    if($reserva['habitacion']){
        if (haySuperposicion($reserva['fecha_inicio'], $reserva['fecha_fin'], $fechaInicioDeseada, $fechaFinDeseada)) {
            // Si hay superposición, la habitación está ocupada
            $tipoHabitacionOcupada = $reserva['habitacion'];
            // Remueve la habitación ocupada de la lista de habitaciones disponibles
            $habitacionesDisponibles = quitarHabitacion($habitacionesDisponibles, $tipoHabitacionOcupada);
        }
    }
}
echo "======================<br>";
echo"<pre>";
print_r($habitacionesDisponibles);
echo"</pre>";
// Al finalizar, $habitacionesDisponibles contendrá las habitaciones que están disponibles para el rango de fechas deseado.

// Función para verificar superposición de fechas
function haySuperposicion($inicioReserva, $finReserva, $inicioDeseado, $finDeseado) {
    return ($inicioReserva <= $finDeseado && $finReserva >= $inicioDeseado);
}

// Función para obtener habitaciones disponibles (simulación)
function obtenerHabitacionesDisponibles($conn) {
    // Aquí puedes realizar la lógica para obtener las habitaciones disponibles de tu base de datos
    // Retorna un array con las habitaciones disponibles
    $sql = 'select a.id id, b.titulo titulo from habitacion a join tipohabitacion b on a.tipo_habitacion=b.id';
    $query = mysqli_query($conn, $sql);
    $salida = array();
    while($row = mysqli_fetch_assoc($query)){
        array_push($salida, $row);
    }
    return $salida;
}

// Función para quitar una habitación de la lista de habitaciones disponibles
function quitarHabitacion($habitaciones, $habitacionOcupada) {
    echo"<pre>";
    print_r([$habitacionOcupada,'Habitación Doble Twin Standard']);
echo"</pre>";
    $array = array([$habitacionOcupada,'Habitación Doble Twin Standard']);
    echo"<pre>";
    print_r($array);
echo"</pre>";
    //return array_diff($habitaciones, [$habitacionOcupada]);
    return array_diff($habitaciones, $array);
}
function obtenerReservas($conn){
    $sql = 'select * from reserva where baja is null';
    $query = mysqli_query($conn, $sql);
    $salida = array();
    while($row = mysqli_fetch_assoc($query)){
        array_push($salida, $row);
    }
    return $salida;
}

?>