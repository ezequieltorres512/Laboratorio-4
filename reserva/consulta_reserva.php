<?php 
include_once("../conexion.php");

$planes=[];
//print_r($_GET);
/*FILTROS */
$tipo = $_GET['tipo'];
$fid = $_GET['fId'];
$fpersona  = $_GET['fPerso'];
$ftipo  =  $_GET['fHabitacion'];
$finicio= $_GET['fInicio'];
$ffin= $_GET['fFin'];
$fprecio= $_GET['fPrecio'];
$id = '';
if($_GET['id'] != ''){
  $id = $_GET['id'];
}
if($tipo == 0){
  $sql="SELECT * FROM reserva";
}elseif($tipo  == 1) {
  $sql="SELECT * FROM reserva WHERE BAJA IS NULL AND habitacion is null ";  
}elseif($tipo  == 2) {
  $sql="SELECT * FROM reserva WHERE BAJA IS NULL AND habitacion is not null ";  
}else{
  $sql="SELECT * FROM reserva WHERE BAJA IS NOT NULL ";  
}
if($id != ''){
  $sql.=" and id_usuario = $id ";  
}

if($fpersona)
  $sql=$sql . " and apellido LIKE '%$fpersona%' or nombre like '%$fpersona%'";
if($fid)
  $sql=$sql . " and id_reserva LIKE '$fid%' ";
if($ftipo)
  $sql=$sql . " and tipoHabitacion LIKE '$ftipo%' ";
if($finicio)
    $sql=$sql . " and fecha_inicio >='".$finicio."' ";
if($ffin)
  $sql=$sql . " and fecha_fin ='".$ffin."' ";
 if($fprecio)
    $sql=$sql . " and precio LIKE '".$fprecio."%' ";
//echo $sql;
if(!strpos($sql, "WHERE")){
  $sql = str_replace('reserva and', 'reserva where', $sql);
}
$query = mysqli_query($conn,$sql);

$nr = mysqli_num_rows($query);
$cantidad=0;
while($row = mysqli_fetch_assoc($query)){
 // print_r($row);
  $sql1 = 'SELECT titulo FROM tipohabitacion WHERE id = '.$row['tipoHabitacion']; 
  $query1 = mysqli_query($conn,$sql1);
  $row1 = mysqli_fetch_assoc($query1);
  $objPlan = new stdClass();
  $objPlan->id=$row['id_reserva'];
  $objPlan->precio=$row['precio'];
  $objPlan->id_usuario=$row['id_usuario'];
  $objPlan->nombre=$row['apellido']." ".$row['nombre'];
  $objPlan->telefono=$row['telefono'];
  $objPlan->fecha_inicio=$row['fecha_inicio'];
  $objPlan->fecha_fin=$row['fecha_fin'];
  $objPlan->habitacion=$row['habitacion'];
  $objPlan->habitacion=$row['descripci'];
  $objPlan->titulo=$row1['titulo'];
  $objPlan->tipoHabitacion=$row['tipoHabitacion'];
  $objPlan->adicional=$row['adicional'];
  $objPlan->vendedor=$row['vendedor'];
  $objPlan->conocidosPor=$row['conocidosPor'];
  $objPlan->baja=$row['baja'];
  if($row['habitacion'] == '' && $row['baja'] == ''){
    $estado="PENDIENTE";
    $color='lightblue';
  }elseif($row['habitacion'] != '' && $row['baja'] == ''){
    $estado="CONFIRMADA";
    $color='green';
  
  }elseif($row['baja']!=''){
    $estado="ELIMINADA ";
    $color='red';
  }
  $objPlan->estado=$estado;
  $objPlan->color=$color;
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