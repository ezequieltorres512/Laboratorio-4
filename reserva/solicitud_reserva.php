<?php
session_start();
include("../conexion.php");
include("../check.php");
$telefono="";
$apellido="";
$nombre="";
$email="";

if(isset($_SESSION['usuario']) && $_SESSION['tipoUser'] =="cliente" ){
    $query = mysqli_query($conn," SELECT telefono, apellido, nombre, email, conocidosPor 
								FROM Cliente
								WHERE id =".$_SESSION['usuario']);
    $row = mysqli_fetch_assoc($query);
    $telefono = $row['telefono'];
    $apellido = $row['apellido'];
    $nombre = $row['nombre'];
    $email = $row['email'];
    $conocidoX = $row['conocidosPor'];   
}

//echo "<pre>"; 
//    print_r($_SESSION);  echo "</pre>";
//exit();

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
    <a href="../index.php" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="../index.php">Inicio</a></li>
        <?php if(isset($_SESSION['usuario'])){ ?>   
        <li><a href="../index.php#reservas">Reservas</a></li>
        <?php if ($_SESSION["tipoUser"] == "admin"){ ?>
        <li><a href="../index.php#control">Control</a></li>
        <?php } } ?>
        <?php if($_SESSION["tipoUser"] == "cliente"){?>
            <li><a href="../index.php#">Nosotros</a></li>
            <li><a href="../index.php#galeria">Galeria</a></li>
            <li><a href="../index.php#contact">Contacto</a></li>
        <?php } ?>
        <div class="bx bx-moon" id="darkmode"></div>
        <?php if(isset($_SESSION['usuario'])){ ?>
            <li><a href="../usuario/controlador_cerrar_session.php">Cerrar Sesion</a></li>
        <?php } ?>
    </ul>
</header>

<section class="about" id="about">
    <form action="alta_reserva.php" method="post">
    <div class="about-container">
        <div class="about-text">
            <div class="home-text">
                    <span>Formulario de alta de Reservas</span>
                    <input type="hidden" name="motivo" value="Alta de reserva">
                    <p>Apellido<br>
                    <input type="text" name="ape" id="ape" required value = "<?php echo $apellido ?>">
                    <p>Nombre<br>
                    <input type="text" name="nom" id="nom" required value = "<?php echo $nombre ?>">
                    <p>Email<br>
                    <input type="email" name="correo" id="correo" required value = "<?php echo $email ?>">
                    <p>Telefono<br>
                    <input type="number" name="tel" id="tel" required value = "<?php echo $telefono ?>">
                    <?php if($_SESSION['tipoUser'] =="admin" or $_SESSION['tipoUser'] !="cliente") { ?>
                        <p>Seleccione como nos conocio<br>
                        <?php  require("../publicidad/publicidad.php");
                    }else {//ConocidoPor del cliente ?>
                    <input type="hidden" name="canal_difusion" value="<?php echo $conocidoX ?>">
                    <?php } ?>
                    <p>Fecha de inicio<br>
                    <?php $fechamin = date("Y-m-d"); ?>
                    <input type="date" name="llegada" id="llegada" min= "<?php echo $fechamin ?>" required>
                    <p>Fecha de Salida<br>
                    <input type="date" name="salida" id="salida" min= "<?php echo $fechamin ?>" required>                
                    <p>Seleccione el tipo de habitacion<br>
                    <select id="habitacion" name="tipoH">
                    </select>
                    <?php
                        include("../habitacion/precios.php");
                    ?>
                    <p>Precio: <input type="text" id="precio" name="precio" readonly></p>
                    <input type="text" name="origen" id="origen" value="8" hidden>
                    <input type="submit">
            </div>
        </div>
    </div>
    </form>
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../js/script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const llegadaInput = document.getElementById('llegada');
        const salidaInput = document.getElementById('salida');
        const tipoHInput = document.getElementById('habitacion');
        const precioInput = document.getElementById('precio');

        llegadaInput.addEventListener('input', calcularPrecio);
        salidaInput.addEventListener('input', calcularPrecio);
        tipoHInput.addEventListener('change', calcularPrecio);

        function calcularPrecio() {
            const fechaLlegada = new Date(llegadaInput.value);
            const fechaSalida = new Date(salidaInput.value);

            const tipoHValue = tipoHInput.value;
            const precio = parseFloat(document.querySelector(`input[name="${tipoHValue}"]`).value);

            const unDia = 24 * 60 * 60 * 1000;
            const numeroDias = Math.round((fechaSalida - fechaLlegada) / unDia);
            const precioTotal = precio * numeroDias;
            precioInput.value = `$${precioTotal.toFixed(2)}`;
        }
    });
</script>


</html>