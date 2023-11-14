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
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="estilos/lightbox.css" rel="stylesheet" />
</head>

<body>

    <header>
        <a href="#" class="logo">La 7ma <span>Hotel</span></a>

        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="inicio.php">Inicio</a></li>
            <?php if(isset($_SESSION['usuario'])){ ?>   
                <li><a href="inicio.php#reservas">Reservas</a></li>
            <?php } ?>
            <li><a href="#galeria">Galeria</a></li>
            <li><a href="#">Sobre Nosotros</a></li>
            <li><a href="inicio.php#contact">Contacto</a></li>
            <div class="bx bx-moon" id="darkmode"></div>
            <?php if(isset($_SESSION['usuario'])){ ?>
                <li><a href="usuario/controlador_cerrar_session.php">Cerrar Sesion</a></li>
            <?php }
        if(!isset($_SESSION['usuario'])){
           // print_r($_SESSION);?>
                <li><a href="index.php">Iniciar Sesion</a></li>
        <?php } ?>


        </ul>
    </header>


    <section class="home">
        <div class="social">
                <a href="https://github.com/ezequieltorres512/Laboratorio-4"><i class='bx bxl-github'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-facebook'></i></a>
        </div>

        <div class="home-img">   
            <img src="imagenes/recepcion.jpg" alt="">
        </div>
        
        <div class="home-text">
            <h1>Sobre Nosotros</h1>
            <h2>Ubicado estratégicamente cerca de Plaza de Mayo, ciudad de Buenos Aires.</h2>
            <p>Con más de 30 años de experiencia, se destaca por ofrecer un servicio turístico de calidad y por su continua búsqueda de innovación para adaptarse a los cambios de la actualidad.</p>
            <p>Asegúrese de garantizar su alojamiento utilizando nuestro sitio de reservas en línea, La 7ma Hotel by Design. Ofrecemos las tarifas más competitivas, sin cargos adicionales sorpresa.</p>
        </div>

    </section>
    
    <section id="galeria">
        <h2 class="heading">Galeria de fotos</h2>
        <div class="contenedor-secundario">
            <div class="tarjeta-secundario">
                <a class="example-image-link" href="imagenes/habitacion.jpg" data-title="Habitación Doble Matrimonial Standard" data-lightbox="example-1"><img class="example-image" src="imagenes/habitacion.jpg" alt="Habitación Doble Matrimonial Standard" /></a>
            </div>
            <div class="tarjeta-secundario">
                <a class="example-image-link" href="imagenes/habitacion4.jpg" data-title="Habitación Familiar, una cama matrimonial mas dos camas individuales" data-lightbox="example-1"><img class="example-image" src="imagenes/habitacion4.jpg" alt="Habitación Familiar, una cama matrimonial mas dos camas individuales" /></a>
            </div>
            <div class="tarjeta-secundario">
                <a class="example-image-link" href="imagenes/piscina.jpg" data-title="Patio con piscina" data-lightbox="example-1"><img class="example-image" src="imagenes/piscina.jpg" alt="patio con piscina" /></a>
            </div>
            <div class="tarjeta-secundario">
                <a class="example-image-link" href="imagenes/habitacion3.jpg" data-title="Habitación Doble Twin Standard, Dos Camas Individuales" data-lightbox="example-1"><img class="example-image" src="imagenes/habitacion3.jpg" alt="Habitación Doble Twin Standard, Dos Camas Individuales" /></a>
            </div>
            <div class="tarjeta-secundario">
                <a class="example-image-link" href="imagenes/penthouse.jpg" data-title="Penthouse frente al obelisco con terraza" data-lightbox="example-1"><img class="example-image" src="imagenes/penthouse.jpg" alt="Penthouse frente al obelisco con terraza" /></a>
            </div>
            <div class="tarjeta-secundario">
                <a class="example-image-link" href="imagenes/habitacion2.jpg" data-title="Habitación Doble Matrimonial con Jacuzzi" data-lightbox="example-1"><img class="example-image" src="imagenes/habitacion2.jpg" alt="Habitación Doble Matrimonial con Jacuzzi" /></a>
            </div>
        </div>
    </section>



    <div class="footer">
        <h2>Redes Sociales</h2>
        <div class="footer-social">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-linkedin'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            
        </div>

    </div>

</body>
<script src="js/script.js"></script>
<script src="js/lightbox-plus-jquery.js"></script>
</html>