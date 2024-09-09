<?php
include_once("../conexion.php");

$query = mysqli_query($conn,"SELECT * FROM 'canales-difusion'");
$nr = mysqli_num_rows($query);
echo "<select name='canal_difusion' id='canal_difusion' required>";
echo "<option></option>";
while($row = mysqli_fetch_assoc($query)){  
	echo "<option value=".$row['id'].">".$row['descripcion']."</option>";
     // print_r($row);
}
echo "</select>";
if($nr == 0) 

{

	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error Publicidad');window.location= '../index.php' </script>";
}
?>