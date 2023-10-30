<?php
include_once("conexion.php");

$email = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE email = '$email' and clave = '".$pass."'");
$nr = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);
$usuario = $row['id_usuario'];
if($nr == 1)
{
	header("Location: menu2.html");
	session_start();
	$_SESSION['email']  = $email;
	$_SESSION['usuario'] = $usuario;
	$queryR = "SELECT * FROM reserva WHERE id_usuario = $usuario";
	$queryReserva = mysqli_query($conn, $queryR);
	$rowReserva = mysqli_fetch_array($queryReserva);
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error');window.location= 'index.html' </script>";
}
?>