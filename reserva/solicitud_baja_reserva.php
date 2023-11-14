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
    <a href="../inicio.php" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">

        <li><a href="../inicio.php">Inicio</a></li>

        <!-- <li><a href="#about">Reservas</a></li>
        <li><a href="#skills">Instalaciones</a></li>
        <li><a href="#services">Servicios</a></li>
        <li><a href="#contact">Contacto</a></li> -->
        <?php if(isset($_SESSION['usuario'])){ ?>   
                <li><a href="../inicio.php#reservas">Reservas</a></li>
            <?php } ?>
            <li><a href="../sobrenosotros.php#galeria">Galeria</a></li>
            <li><a href="../sobrenosotros.php#">Sobre Nosotros</a></li>
            <li><a href="../inicio.php#contact">Contacto</a></li>
            <div class="bx bx-moon" id="darkmode"></div>
            <?php if(isset($_SESSION['usuario'])){ ?>
                <li><a href="../usuario/controlador_cerrar_session.php">Cerrar Sesion</a></li>
            <?php } ?>
    </ul>
</header>


<section class="about" id="about">
    <?php               
        $query1 = mysqli_query($conn,"SELECT reserva.id_reserva, reserva.nombre, reserva.apellido FROM reserva WHERE baja IS NULL ");
        if($nr = mysqli_num_rows($query1)){
    ?>
    <form action="baja_reserva.php" method="post">
    <div class="about-container">
        <div class="about-text">
            <div class="home-text">
                  <h1>Formulario baja de Reservas</h1>
                  <br>
                  <span>Lista de solicitudes</span>
                  <?php
                    require("lista_reserva.php");
                    ?>
                  <input type="hidden" name="motivo" value="Baja de reserva">
                  <p>Seleccione Nro. de reserva a dar de Baja: </p>
                  <select name='reservas' id='reservas'>  
                  <?php
                        while($row = mysqli_fetch_assoc($query1)){     
                            echo "<option value=" .$row['id_reserva'].">".$row['id_reserva']." - ".$row['nombre']." ".$row['apellido']."</option>";
                        }
                        ?>
                  </select>
                  <input type="text" name="origen" id="origen" value="8" hidden>
                  <input type="submit">
            </div>
        </div>
    </div>
    </form>
    <?php }else{ 
        $_POST['motivo']="Disposición de Reservas NO";
        require("../mensajes/redireccion_mensaje.php");
    }
        ?>
</section>
</body>
<script src="../js/script.js"></script>
</html>