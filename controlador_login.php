
<?php

/************************************************************* */
/*
include_once("conexion.php");

$email = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];


$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE email = '$email' and clave = '".$pass."'");
$nr = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
$usuario = $row['id_usuario'];
	
if($nr == 1)
{
	//header("Location: inicio.html");
	session_start();
	$_SESSION['email']  = $email;
	$_SESSION['usuario'] = $usuario;
	$queryR = "SELECT * FROM reserva WHERE id_usuario = $usuario";
	$queryReserva = mysqli_query($conn, $queryR);
	$cantReservas = mysqli_num_rows($queryReserva);
	echo $cantReservas;
	echo "HOLAAA\n";
	
	if($cantReservas > 0){
		$rowReserva = mysqli_fetch_assoc($queryReserva);
		//$_SESSION['']
		print_r($_SESSION);
		echo "\n";
		print_r($rowReserva);
	}
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error');window.location= 'index.html' </script>";
}
*/
/************************************************************* */
include_once("conexion.php");
session_start();

if(!empty($_POST["btnIngresar"])){
	//validar usuario y contraseña
	if(!empty($_POST["txtusuario"]) and !empty($_POST["txtpassword"])){
		$usuario = $_POST["txtusuario"];
		$password = $_POST["txtpassword"];
		$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE email = '$usuario' and clave = '$password'");
		$datos = mysqli_fetch_assoc($query);

		if($datos){
			$_SESSION["id"]=$datos["id_usuario"];
			$_SESSION["nombre"]=$datos["nombres"];
			$_SESSION["apellido"]=$datos["apellidos"];
			header("location: inicio.php");
		}
		else{
			echo "Acceso denegado";
		}
	} else{
		echo "Campos Vacios";
	}
}


?>
