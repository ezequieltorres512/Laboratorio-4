<?php
include_once("../conexion.php");

$query = mysqli_query($conn,"SELECT reserva.id_reserva, reserva.nombre, reserva.apellido FROM reserva WHERE baja IS NULL ");
$nr = mysqli_num_rows($query);
echo "<select name='reservas' id='reservas'>";  
while($row = mysqli_fetch_assoc($query)){
	
    echo "<option value=" .$row['id_reserva'].">".$row['id_reserva']." - ".$row['nombre']." ".$row['apellido']."</option>";
}
echo "</select>";
if($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('No hay reservas pendientes');window.location= '../inicio.php' </script>";
}
?>