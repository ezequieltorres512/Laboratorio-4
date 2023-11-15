<?php
    session_start();
 //   include("check.php");
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
</head>

<body onload="visible('<?echo $_SESSION['tipoUser']?>')">
<header>
    <a href="#" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="#home">Inicio</a></li>
        <?php if(isset($_SESSION['usuario'])){ ?>   
            <li><a href="#reservas">Reservas</a></li>
        <?php } ?>
        <li><a href="sobrenosotros.php#galeria">Galeria</a></li>
        <li><a href="sobrenosotros.php">Sobre Nosotros</a></li>
        <li><a href="#contact">Contacto</a></li>
        <div class="bx bx-moon" id="darkmode"></div>
        <?php if(isset($_SESSION['usuario'])){ ?>
            <li><a href="usuario/controlador_cerrar_session.php">Cerrar Sesion</a></li>
        <?php }
        if(!isset($_SESSION['usuario'])){
           // print_r($_SESSION);?>
                <li><a href="inicio.php">Iniciar Sesion</a></li>
        <?php } ?>
    </ul>
</header>
 
<section class="home" id="home">
    <div class="social">
        <a href="https://github.com/ezequieltorres512/Laboratorio-4"><i class='bx bxl-github'></i></a>
        <a href="#"><i class='bx bxl-instagram'></i></a>
        <a href="#"><i class='bx bxl-facebook'></i></a>
    </div>

    <div class="home-img">
        <img src="imagenes/habitacion.jpg" alt="imagen habitacion inicio">
    </div>

    <div class="home-text">
        <h1>Bienvenidos a La 7ma Hotel</h1>
        <h2>Ubicado en el centro de la ciudad con un diseño urbano, moderno y de vanguardia. Ofrecemos instalaciones de primer nivel para su estadía de negocios o placer. </h2>
        <h3>
        <?php
        echo "Bienvenido";
        if(isset($_SESSION["nombre"])){
            echo " ".$_SESSION["nombre"]." ".$_SESSION["apellido"];
            if($_SESSION["tipoUser"] != "cliente"){
                echo " (".$_SESSION["tipoUser"].")";
            }else{
                include_once("conexion.php");
                $sql = "SELECT * FROM reserva WHERE id_usuario = ".$_SESSION["usuario"];
                $query = mysqli_query($conn, $sql);
                $cantidadReservas = mysqli_num_rows($query);
            }
        }
        ?>

        </h3>
        <p>Los invitamos a conocer mas sobre nuestros servicios<br> <br>
        <a href="sobrenosotros.php" class="btn">SOBRE NOSOTROS</a>
        
    </div>
</section>

<?php if(isset($_SESSION['usuario'])){ ?>
<section class="services" id="reservas">
    <div class="heading">
        <h2>Reservas</h2>
        
    </div>
    <div class="services-content">
    <?php if($_SESSION['tipoUser'] == 'admin' || $_SESSION['tipoUser'] == 'recepcionista'){ ?>
        <div class="services-box">
            <a href="reserva/listado.php">
                <i class='bx bx-list-ul bx-flip-vertical' ></i>
                <h3>Listado</h3>
            </a>
        </div>
        <!-- <div class="services-box">
            <a href="reserva/solicitud_baja_reserva.php">
                <i class='bx bx-folder-minus' ></i>
                <h3>Baja</h3>
            </a>
        </div> -->
        <?php } ?>
        <div class="services-box">
            <a href="reserva/solicitud_reserva.php">
                <i class='bx bx-folder-plus bx-tada' ></i>
                <h3>Alta</h3>
            </a>
        </div>
        <?php if($_SESSION['tipoUser'] == 'cliente'){ ?>        
        <div class="services-box">
            <a href="reserva/listado.php">
                <i class='bx bx-edit' ></i>
                <h3>Modificacion</h3>
            </a>
        </div>
        <?php } ?>    
    </div>
</section>
<?php if($_SESSION['tipoUser'] == 'admin'){ ?>
<section class="services" id="reservas">
    <div class="heading">
        <h2>Centro de Control</h2>
    </div>
    <div class="services-content">
        <div class="services-box">
            <a href="usuario/alta_empleado.php">
                <i class='bx bx-child' ></i>
                <h3>Alta de Empleado</h3>
            </a>
        </div>
        <div class="services-box">
            <a href="habitacion/tipo_habitacion.php">
                <i class='bx bx-bookmark-plus'></i>
                <h3>Alta de Tipo de habitacion</h3>
            </a>
        </div>
        <div class="services-box">
            <a href="habitacion/habitacion.php">
                <i class='bx bx-buildings' ></i>
                <h3>Alta de habitacion</h3>
            </a>
        </div>
    </div>
</section>
<?php } ?>
<?php }
if( !isset($_SESSION["tipoUser"]) || ( isset($_SESSION["tipoUser"]) && $_SESSION["tipoUser"] == "cliente")){ ?>
<section class="contact" id="contact">
    <div class="heading">
        <h2>Contacto</h2>

    </div>
        <div class="contact-form">
            <form action="comentario/comentario.php" method='post'>
                <input type="hidden" name="motivo" value="Consulta cargada">
                <input type="text" name="nom" id="nom" placeholder="Tu nombre">
                <input type="email" name="correo" id="correo" placeholder="Tu email">
                <textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="Dejame tu comentario que me contacto a la brevedad"></textarea>
                    <input type='submit'  class="btn"></input>

            </form>
        </div>
</section>
<?php } ?>                     
    <div class="footer">
        <h2>Redes Sociales</h2>
        <div class="footer-social">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-linkedin'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            
        </div>

    </div>

                           
    <script src="js/script.js"></script>
</body>

</html>
