<?php
include_once("../conexion.php");

$query = mysqli_query($conn,"SELECT * FROM reserva");
$nr = mysqli_num_rows($query);
echo "<select name='reservas' id='reservas'>";  
while($row = mysqli_fetch_assoc($query)){
    echo "<option value=".$row['id_reserva'].">".$row['id_reserva']." - ".$row['fecha_fin']."</option>";
    // print_r($row);
}
echo "</select>";
if($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error');window.location= '../index.html' </script>";
}
?>