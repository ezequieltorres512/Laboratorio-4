<?php
//session_start();
include_once("../conexion.php");
$where = ($_SESSION['tipoUser'] = 'cliente')? 'WHERE id_usuario = '.$_SESSION['usuario'] :''; 
$query = mysqli_query($conn,"SELECT * FROM reserva $where order by fecha_inicio asc");
$nr = mysqli_num_rows($query);
$precios=array();

echo "<select name='id_seleccionado' id='id_seleccionado' required>";

echo "<option value=''></option>";
while($row = mysqli_fetch_assoc($query)){
    echo "<option value=".$row['id_reserva'].">".$row['fecha_inicio']." en la habitacion ".$row['habitacion']."</option>";
}
echo "</select>";
if($nr == 0) 
{
	echo "<script> alert('Error');window.location= '../index.html' </script>";
}
?>