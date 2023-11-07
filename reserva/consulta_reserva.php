<?php 
include_once("../conexion.php");





$planes=[];

/*FILTROS
$cod_tipo = $_GET['orden'];
$fSolicitante  = $_GET['fSolicitante'];
$fFecha  =  $_GET['fFecha'];
$fTipo= $_GET['fTipo'];
$fServicio= $_GET['fServicio'];

$fContrato= $_GET['fContrato'];
$fConsulta= $_GET['fConsulta'];
*/

$query = mysqli_query($conn,"SELECT * FROM reserva");
/*
  if($fRazon)
  $sql=$sql . " and a.razon_social LIKE '".$fRazon."%' ";
  if($fFecha)
    $sql=$sql . " and a.fecha >= to_timestamp('".$fFecha."','YYYY/MM/DD') ";
  if($fSolicitante)
    $sql=$sql . " and a.usuario_solicitante LIKE '".$fSolicitante."%' ";
  if($fTipo)
    $sql=$sql . " and z.descripcion LIKE '%".$fTipo."%' ";
*/
$nr = mysqli_num_rows($query);
$cantidad=0;
while($row = mysqli_fetch_assoc($query)){
  $objPlan = new stdClass();
  $objPlan->id=$row['id_reserva'];
  $objPlan->precio=$row['precio'];
  $objPlan->id_usuario=$row['id_usuario'];
  $objPlan->nombre=$row['apellido']." ".$row['nombre'];
  $objPlan->telefono=$row['telefono'];
  $objPlan->fecha_inicio=$row['fecha_inicio'];
  $objPlan->fecha_fin=$row['fecha_fin'];
  $objPlan->habitacion=$row['habitacion'];
  $objPlan->tipoHabitacion=$row['tipoHabitacion'];
  $objPlan->tipoHabitacion=$row['adicional'];
  $objPlan->tipoHabitacion=$row['vendedor'];
  $objPlan->tipoHabitacion=$row['conocidosPor'];
  $objPlan->tipoHabitacion=$row['baja'];
  array_push($planes,$objPlan);
  $cantidad++;
}
$totalregistros = $cantidad;

$objPlanes = new stdClass(); 
$objPlanes->planes=$planes; 
$objPlanes->cuenta=$totalregistros;
$salidaJson = json_encode($objPlanes);

echo $salidaJson;



?>