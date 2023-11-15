<?php
include("../conexion.php");
$sql="SELECT * FROM tipohabitacion";
$query = mysqli_query($conn,$sql);

$nr = mysqli_num_rows($query);
$cantidad=0;
$planes=array();
while($row = mysqli_fetch_assoc($query)){
 //print_r($row);
  $objPlan = new stdClass();
  $objPlan->id=$row['id'];
  $objPlan->descripcion=$row['titulo'];
  array_push($planes,$objPlan);
  $cantidad++;
}

$totalregistros = $cantidad;

$objPlanes = new stdClass(); 
$objPlanes->planes=$planes; 
$objPlanes->cuenta=$totalregistros;
$salidaJson = json_encode($objPlanes);
//print_r($planes);
echo $salidaJson;
?>