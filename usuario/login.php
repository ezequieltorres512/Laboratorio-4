<?php
include_once("../conexion.php");

$email = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];
$pass=md5($pass);

$query = mysqli_query($conn,"	SELECT 'empleado' AS tipo_usuario, ID AS id_usuario, puesto as puesto, apellido, nombre, estado 
								FROM empleado 
								WHERE email = '$email' AND clave = '$pass' 
								UNION ALL 
								SELECT 'cliente' AS tipo_usuario, ID AS id_usuario, 'cliente' as puesto, apellido, nombre, estado 
								FROM cliente
								WHERE email = '$email' AND clave = '$pass';");
$nr = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
if($nr == 1)
{
		
	if($row['estado'] == 1){
		session_start();
		$_SESSION['email']  = $email;
		$_SESSION['usuario'] = $row['id_usuario'];

		$_SESSION['apellido'] = $row['apellido'];
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['tipoUser'] = $row['puesto'];
		//print_r($_SESSION);
		//echo "\n";
		//print_r($row);
		header("Location: ../index.php");
	}else{
		echo "<script> alert('Usuario dado de Baja');window.location= '../index.php' </script>";
	}
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error en los datos Ingresados');window.location= '../index.php' </script>";
}
?>
