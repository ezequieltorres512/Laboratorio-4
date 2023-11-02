<?php

include_once("conexion.php");
//return;
 
    if(isset($_SESSION['usuario'])){

        $usuario=$_SESSION['usuario'];
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
       
       // echo  "<h1>$queryR HOLAAA\t$cantReservas\n->".$_SESSION['usuario'].mysqli_error($conn)."</h1>";
        if($cantReservas > 0){
            $rowReserva = mysqli_fetch_assoc($queryReserva);
            
            $_SESSION['apellido'] = $rowReserva['apellido'];
            $_SESSION['nombre'] = $rowReserva['nombre'];
            $_SESSION['tipoUser'] = $rowReserva['TipoUsuario'];
            //print_r($_SESSION);
            //echo "\n";
            //print_r($rowReserva);
        }
       // header("Location: inicio.php");
    }
?>