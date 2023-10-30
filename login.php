<?php
include_once("conexion.php");

$email = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE email = '$email' and clave = '".$pass."'");
$nr = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
$usuario = $row['id_usuario'];
if($nr == 1)
{
	
	session_start();
	$_SESSION['email']  = $email;
	$_SESSION['usuario'] = $usuario;
	$queryR = "SELECT * FROM reserva WHERE id_usuario = $usuario";
	$queryReserva = mysqli_query($conn, $queryR);
	$cantReservas = mysqli_num_rows($queryReserva);
	echo "HOLAAA\n";
	if($cantReservas > 0){
		$rowReserva = mysqli_fetch_assoc($queryReserva);
		//$_SESSION['']
		//print_r($_SESSION);
		//echo "\n";
		//print_r($rowReserva);
	}
	header("Location: menu2.html");
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error');window.location= 'index.html' </script>";
}
?>