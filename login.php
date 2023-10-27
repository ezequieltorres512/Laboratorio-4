<?php
include_once("conexion.php");

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE id_usuario = $nombre and clave = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	header("Location: menu2.html");
	session_start();
	$_SESSION['user']  = $pass;
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error');window.location= 'index.html' </script>";
}
?>