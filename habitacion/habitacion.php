<?php
    session_start();
    include("../check.php");      
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

<body onload="alta()">
 
<header>
    <a href="../inicio.php" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="#home">Inicio</a></li>
        <li><a href="#contact">Contacto</a></li>
        <div class="bx bx-moon" id="darkmode"></div>
    </ul>
</header>
<center>  
    <form id = 'alta_usr' action="alta.php" method="post">
        <div class="about-container">
                <div class="about-text">
                    <div class="home-text">
                            <span>Formulario de alta nueva Habitacion</span>
                            <input type="hidden" name="motivo" value="Alta de habitacion">
                            <input type="hidden" name="habi" id="habi" value="ok">
                            <p>Piso<br>
                            <input type="number" name="piso" id="piso" required>
                            <p>Puerta<br>
                            <input type="number" name="puerta" id="puerta" required>
                            <p>Seleccione el tipo de habitacion<br>
                            <select name="tipoH" id="habitacion"></select>
                            <p>Ingrese una descipcion<br>
                            <input type="text" name="descripcion" id="descripcion" maxlength="300" required>
                            <input type="submit">
                    </div>
                </div>
        </div>
    </form>
</center>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../js/script.js"></script>
</body>