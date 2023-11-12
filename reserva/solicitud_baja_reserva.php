<?php
session_start();
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
    <a href="#" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">

        <li><a href="../inicio.php">Inicio</a></li>

        <li><a href="#about">Reservas</a></li>
        <li><a href="#skills">Instalaciones</a></li>
        <li><a href="#services">Servicios</a></li>
        <li><a href="#contact">Contacto</a></li>
        <div class="bx bx-moon" id="darkmode"></div>
    </ul>
</header>


<section class="about" id="about">
    <form action="baja_reserva.php" method="post">
    <div class="about-container">
        <div class="about-text">
            <div class="home-text">
                  <h1>Formulario baja de Reservas</h1>
                  <br>
                  <span>Lista de solicitudes</span>
   

                  <?php
                                    echo "<pre>"; 
                                    print_r($_SESSION);  echo "</pre>";
                                    
                                    exit(); 
                    require("lista_reserva.php");
                  ?>
                  <p>Seleccione Nro. de reserva a dar de Baja: </p>
                  <?php
                    require("reserva.php");
                  ?>
                  <input type="text" name="origen" id="origen" value="8" hidden>
                  <input type="submit">
            </div>
        </div>
    </div>
    </form>
</section>
</body>
<script src="../js/script.js"></script>
</html>