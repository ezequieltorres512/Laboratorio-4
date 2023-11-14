<?php
include_once("../conexion.php");

//$query = mysqli_query($conn,"SELECT * FROM reserva WHERE baja IS NULL");

$query = mysqli_query($conn,"SELECT reserva.id_reserva, reserva.fecha_inicio, reserva.fecha_fin
                                    , reserva.nombre, reserva.apellido
                                    , tipohabitacion.descripcionCamas AS descripcion
                                    , tipohabitacion.titulo, tipohabitacion.precio
                                    FROM reserva 
INNER JOIN tipohabitacion ON reserva.tipoHabitacion = tipohabitacion.id WHERE baja IS NULL ");

//$nr = mysqli_num_rows($query);
echo "
<table>
    <tr>
            <th>Nro. Reserva</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha Inicio</th>
            <th>Fecha Salida</th>
            <th>Habitacion</th>
            <th>Obs.</th>
            <th>Precio</th>
    </tr>";

while($row = mysqli_fetch_assoc($query)){
    echo "
    <tr>                    
        <td>".$row['id_reserva']."</td>
        <td>".$row['nombre']."</td>
        <td>".$row['apellido']."</td>
        <td>".$row['fecha_inicio']."</td>
        <td>".$row['fecha_fin']."</td>
        <td>".$row['titulo']."</td>
        <td>".$row['descripcion']."</td>
        <td>".$row['precio']."</td>
    </tr>
    ";
}
echo "</table>";

// if($nr == 0) 
// {
// 	//header("Location: login.html");
// 	//echo "No ingreso"; 
// 	echo "<script> alert('No hay Solicitudes de Reservas Pendientes!!');window.location= '../inicio.php' </script>";
// }
// ?>