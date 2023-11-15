<?php
include_once("../conexion.php");

$query = mysqli_query($conn,"SELECT * FROM tipohabitacion");
$nr = mysqli_num_rows($query);
$precios=array();

//echo "<select name='tipoH' id='tipoH' required>";

//echo "<option value=''></option>";
while($row = mysqli_fetch_assoc($query)){
  //  echo "<option value=".$row['id'].">".$row['titulo']."</option>";
    // print_r($row);
    $precios[$row['id']]=$row['precio'];
}
//echo "</select>";
foreach($precios as $id_precio => $cantidad){
    echo "<input type='hidden' name='$id_precio' value='$cantidad'>";
}
//echo "<pre>";print_r($precios);echo"</pre>";

?>