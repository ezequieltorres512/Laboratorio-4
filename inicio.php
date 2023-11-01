<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel la 7ma</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
 
<header>
    <a href="#" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="#home">Inicio</a></li>
        <li><a href="#about">Reservas</a></li>
        <li><a href="#skills">Instalaciones</a></li>
        <li><a href="#services">Servicios</a></li>
        <li><a href="#contact">Contacto</a></li>
        <div class="bx bx-moon" id="darkmode"></div>
    </ul>
</header>
 
<section class="home" id="home">
    <div class="social">
        <a href="https://github.com/ezequieltorres512/Laboratorio-4"><i class='bx bxl-github'></i></a>
        <a href="#"><i class='bx bxl-instagram'></i></a>
        <a href="#"><i class='bx bxl-facebook'></i></a>
    </div>
    <div class="home-img">
        <img src="/Foto.jpg" alt="">
    </div>
    <div class="home-text">
        <h1>La 7ma esta feliz de recibirlos</h1>
        <h2>Somos un Hotel hermoso</h2>
        <h3>
        <?php
        echo "Bienvenido";
        if(isset($_SESSION["nombre"])){
            echo " ".$_SESSION["nombre"]." ".$_SESSION["apellido"];
        }
        ?>

        </h3>
        <p>Te invito a que conozcas mas sobre nuestros servicios<br> <br>
        <a href="controlador.php" class="btn">Descargar</a>
    </div>
</section>


<section class="about" id="about">
    <div class="heading">
        <h2>Mi perfil</h2>
        <span>Introduccion</span>
    </div>

    <div class="about-container">
        <div class="about-img">
            <img src="/Foto.jpg" alt="">
        </div>
        <div class="about-text">
            <p>Chamulo<br>
           <br>Chamullo</p>
            <div class="information">
                <div class="info-box">
                    <i class='bx bxs-user'></i>
                    <span>..</span>
                </div>

                <div class="info-box">
                    <i class='bx bxs-phone'></i>
                    <span>..</span>
                </div>

                <div class="info-box">
                    <i class='bx bxs-envelope'></i>
                    <span>..</span>
                </div>
            </div>
            <a href="/" class="btn">Descargar</a>
        </div>
    </div>
</section>

<section class="skills" id="skills">
    <div class="heading">
        <h2>Servicios</h2>
    </div>

    <div class="about-container">
        <div class="about-img">
            <img src="/Foto.jpg" alt="">
        </div>
        <div class="about-text">
            <a href="/" class="btn">Descargar</a>
        </div>
    </div>
</section>

<section class="services" id="services">
    <div class="heading">
        <h2>Servicios</h2>
        
    </div>
    <div class="services-content">

        <div class="services-box">
            <a href="solicitud_reserva.php">
                <i class='bx bx-code-alt'></i>
                <h3>Alta de Reserva</h3>
            </a>
        </div>

        <div class="services-box">
            <a href="solicitud_baja_reserva.php">
                <i class='bx bx-server'></i>
                <h3>Baja de Reserva</h3>
            </a>
        </div>

        <div class="services-box">
            <a href="formModif.html">
                <i class='bx bxl-android'></i>
                <h3>Modificacion</h3>
            </a>
        </div>
    </div>
</section>

<section class="contact" id="contact">
    <div class="heading">
        <h2>Contacto</h2>
  
    </div>
    <div class="contact-form">
        <form action="enviar_correo.php">
            <input type="text" name='nombre 'placeholder="Tu nombre">
            <input type="email" name="correo" id="" placeholder="Tu email">
            <textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="Dejame tu mensaje que me conindextacto a la brevedad"></textarea>
                <a href="/" class="btn">Descargar</a>
                                </form>
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

                           
                            <script src="script.js"></script>
</body>
<script>
    // Elementos del DOM
    const loginForm = document.getElementById("loginForm");
    const showLoginFormButton = document.getElementById("showLoginFormButton");
    const pageContent = document.getElementById("pageContent");

    // Manejar el evento de clic en el bot�n
    showLoginFormButton.addEventListener("click", function() {
      // Mostrar u ocultar el formulario de inicio de sesi�n
      loginForm.style.display = loginForm.style.display === "none" ? "block" : "none";
      
      // Mostrar u ocultar el contenido de la p�gina
      pageContent.style.display = pageContent.style.display === "none" ? "block" : "none";
    });
  </script>
</html>
