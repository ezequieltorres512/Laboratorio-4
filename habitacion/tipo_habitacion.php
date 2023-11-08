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
                            <span>Formulario de alta nuevo tipo de Habitacion</span>
                            <input type="hidden" name="motivo" value="Alta de tipo de Habitacion">
                            <input type="hidden" name="tipoHabi" id="tipoHabi" value="ok">
                            <p>Precio<br>
                            <input type="numbre" name="precio" id="precio" required>
                            <p>Titulo<br>
                            <input type="text" name="titulo" id="titulo" maxlength="100" required>
                            <p>Metros Cuadrados<br>
                            <input type="numbre" name="metros" id="metros" required>
                            <p>Cantidad de Ba&nacute;o<br>
                            <input type="number" name="toilets" id="toilets" required>
                            <p>Descripcion de Camas<br>
                            <input type="text" name="descCamas" id="descCamas" maxlength="100" required>
                            <input type="submit">
                    </div>
                </div>
        </div>
    </form>
</center>
</body>