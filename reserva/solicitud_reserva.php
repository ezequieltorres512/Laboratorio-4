<?php
session_start();
include("../conexion.php");

$telefono="";
$apellido="";
$nombre="";
$email="";

if(isset($_SESSION['usuario']) && $_SESSION['tipoUser'] =="cliente" ){
    $query = mysqli_query($conn," SELECT telefono, apellido, nombre, email 
								FROM Cliente
								WHERE id =".$_SESSION['usuario']);
    $row = mysqli_fetch_assoc($query);
    $telefono = $row['telefono'];
    $apellido = $row['apellido'];
    $nombre = $row['nombre'];
    $email = $row['email'];   
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
                    <p>Fecha de inicio<br>
                    <input type="date" name="llegada" id="llegada" required>
                    <p>Fecha de Salida<br>
                    <input type="date" name="salida" id="salida" required>                
                    <p>Seleccione el tipo de habitacion<br>
                    <select id="habitacion" name="tipoH">
                    </select>
                    <?php
                        include("../habitacion/precios.php");
                    ?>
                    <p>Precio: <input type="text" id="precio" name="precio" readonly></p>
                    <p>Seleccione como nos conocio<br>
                    <?php
                        require("../publicidad/publicidad.php");
                    ?>
                    <input type="text" name="origen" id="origen" value="8" hidden>
                    <input type="submit">
            </div>
        </div>
    </div>
    </form>
</section>
<section>

</section>
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