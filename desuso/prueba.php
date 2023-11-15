<?php
// include_once("../conexion.php");

// Rango de fechas deseado
$fechaInicioDeseada = '2023-12-01';
$fechaFinDeseada = '2023-12-05';
$tipo = 3;
// Obtén la lista de habitaciones disponibles (puedes obtenerla de tu base de datos)
$habitacionesDisponibles = obtenerHabitacionesDisponibles($conn, $tipo);
// echo"<pre>";
// print_r($habitacionesDisponibles);
// echo"</pre>";
// Obtén la lista de reservas existentes (puedes obtenerla de tu base de datos)
$reservas = obtenerReservas($conn, $tipo);
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
// echo"<pre>";
// print_r($habitacionesDisponibles);
// echo"</pre>";
// Al finalizar, $habitacionesDisponibles contendrá las habitaciones que están disponibles para el rango de fechas deseado.

// Función para verificar superposición de fechas
function haySuperposicion($inicioReserva, $finReserva, $inicioDeseado, $finDeseado) {
    //echo "<br>$inicioReserva <= $finDeseado && $finReserva >= $inicioDeseado<br>";
    return ($inicioReserva <= $finDeseado && $finReserva >= $inicioDeseado);
}

// Función para obtener habitaciones disponibles (simulación)
function obtenerHabitacionesDisponibles($conn, $tipo) {
    // Aquí puedes realizar la lógica para obtener las habitaciones disponibles de tu base de datos
    // Retorna un array con las habitaciones disponibles
    $sql = 'select a.id id,a.piso,a.puerta, a.descripcion, b.titulo titulo from habitacion a join tipohabitacion b on a.tipo_habitacion=b.id where tipo_habitacion = '.$tipo;
    $query = mysqli_query($conn, $sql);
    $salida = array();
    while($row = mysqli_fetch_assoc($query)){
        array_push($salida, $row);
    }
    return $salida;
}

// Función para quitar una habitación de la lista de habitaciones disponibles
function quitarHabitacion($habitaciones, $habitacionOcupada) {
//     echo"<pre>";
//     print_r([$habitacionOcupada,'Habitación Doble Twin Standard']);
// echo"</pre>";
    $array = array(['id' => $habitacionOcupada]);
    // Utiliza un bucle para encontrar y eliminar la habitación ocupada
    foreach ($habitaciones as $key => $habitacion) {
        //echo $habitacion['id']."*".$habitacionOcupada."<br>";
        if ($habitacion['id'] === $habitacionOcupada) {
            unset($habitaciones[$key]);
            break; // Rompe el bucle una vez que se ha encontrado y eliminado la habitación
        }
    }

    // Muestra las habitaciones después de la eliminación
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

?>