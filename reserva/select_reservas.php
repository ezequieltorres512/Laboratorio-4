<?php
//session_start();
include_once("../conexion.php");
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<pre>"; 
print_r($_SESSION);
echo "</pre>";

$where = ($_SESSION['tipoUser'] == 'cliente')? 'WHERE id_usuario = '.$_SESSION['usuario'] :''; 
$sql = "SELECT * FROM reserva $where order by fecha_inicio asc";
echo "$sql";
$query = mysqli_query($conn,$sql);

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
	echo "<script> alert('Error Reservas');window.location= '../index.php' </script>";
}
?>