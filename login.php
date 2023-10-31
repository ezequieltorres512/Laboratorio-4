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
	$queryU = "SELECT * FROM ";
	//$queryR = "SELECT * FROM reserva WHERE id_usuario = $usuario";
	$queryR = "SELECT
					R.id_reserva AS ReservaID,
					U.email,
					CASE
						WHEN C.UsuarioID IS NOT NULL THEN 'Cliente'
						WHEN E.UsuarioID IS NOT NULL THEN 'Empleado'
						ELSE 'Otro' -- Puedes agregar más casos según tus necesidades
					END AS TipoUsuario,
					CASE
						WHEN C.UsuarioID IS NOT NULL THEN C.apellido
						WHEN E.UsuarioID IS NOT NULL THEN E.apellido
						ELSE NULL
					END AS apellido,
					CASE
						WHEN C.UsuarioID IS NOT NULL THEN C.nombre
						WHEN E.UsuarioID IS NOT NULL THEN E.nombre
						ELSE NULL
					END AS nombre,
					R.fecha_inicio,
					R.tipoHabitacion
					FROM Reserva R
					LEFT JOIN Usuarios U ON R.id_usuario = U.id_usuario
					LEFT JOIN Clientes C ON U.id_usuario = C.UsuarioID
					LEFT JOIN Empleados E ON U.id_usuario = E.UsuarioID
					WHERE R.id_usuario = $usuario";
	$queryReserva = mysqli_query($conn, $queryR);
	$cantReservas = mysqli_num_rows($queryReserva);
	
	
	//echo "HOLAAA\t$cantReservas\n";
	if($cantReservas > 0){
		$rowReserva = mysqli_fetch_assoc($queryReserva);
		
		$_SESSION['apellido'] = $rowReserva['apellido'];
		$_SESSION['nombre'] = $rowReserva['nombre'];
		//print_r($_SESSION);
		//echo "\n";
		//print_r($rowReserva);
	}
	header("Location: inicio.php");
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error');window.location= 'index.html' </script>";
}
?>