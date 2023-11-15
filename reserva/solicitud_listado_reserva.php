<?php
session_start();
include_once("../conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel la 7ma</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>

<header>
    <a href="../index.php" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">

        <li><a href="../index.php">Inicio</a></li>

        <!-- <li><a href="#about">Reservas</a></li>
        <li><a href="#skills">Instalaciones</a></li>
        <li><a href="#services">Servicios</a></li>
        <li><a href="#contact">Contacto</a></li> -->
        <?php if(isset($_SESSION['usuario'])){ ?>   
                <li><a href="../index.php#reservas">Reservas</a></li>
            <?php } ?>
            <li><a href="../sobrenosotros.php#galeria">Galeria</a></li>
            <li><a href="../sobrenosotros.php#">Sobre Nosotros</a></li>
            <div class="bx bx-moon" id="darkmode"></div>
            <?php if(isset($_SESSION['usuario'])){ ?>
                <li><a href="../usuario/controlador_cerrar_session.php">Cerrar Sesion</a></li>
            <?php } ?>
    </ul>
</header>


<section class="about" id="about">
    <?php          
        $sql = "SELECT reserva.id_reserva, reserva.fecha_inicio, reserva.fecha_fin
        , reserva.nombre, reserva.apellido
        , tipohabitacion.descripcionCamas AS descripcion
        , tipohabitacion.titulo, tipohabitacion.precio
        FROM reserva 
        INNER JOIN tipohabitacion ON reserva.tipoHabitacion = tipohabitacion.id WHERE baja IS NULL and reserva.id_usuario = ".$_SESSION["usuario"];
        $query = mysqli_query($conn, $sql);

        if($nr = mysqli_num_rows($query)){
    ?>
    <div class="about-container">
        <div class="about-text">
            <div class="home-text">
                  <h1>Lista de solicitudes</h1>
                  <br>
                  
                  <span>Lista solicitudes pendientes de <?php  echo " ".$_SESSION["nombre"]." ".$_SESSION["apellido"]; ?> </span>
                    <table>
                            <tr>
                                <th>Nro. Reserva</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Salida</th>
                                <th>Habitacion</th>
                                <th>Obs.</th>
                                <th>Precio</th>
                                </tr>
                        <?php 
                        while($row = mysqli_fetch_assoc($query)){
                            echo "
                            <tr>                    
                            <td>".$row['id_reserva']."</td>
                            <td>".$row['nombre']."</td>
                            <td>".$row['apellido']."</td>
                            <td>".$row['fecha_inicio']."</td>
                            <td>".$row['fecha_fin']."</td>
                            <td>".$row['titulo']."</td>
                            <td>".$row['descripcion']."</td>
                            <td>".$row['precio']."</td>
                            </tr>
                            ";
                            }
                        ?>
                    </table>   
            </div>
        </div>
    </div>
    <?php }?>
</section>
</body>
<script src="../js/script.js"></script>
</html>