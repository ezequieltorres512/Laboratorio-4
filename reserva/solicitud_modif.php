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
<?php if( !isset($_POST['id_seleccionado']) ){?>
    <section class="about" id="about">
        <form action="solicitud_modif.php" method="post">
            <div class="about-container">
                <div class="about-text">
                    <div class="home-text">
                        <span>Modificacion de Reservas</span>
                        <!-- <input type="hidden" name="id_seleccionado" value="Alta de reserva"> -->
                        <p>Seleccione el ID de la reserva<br>
                        <?php
                            require("select_reservas.php");
                        ?>
                        <input type="submit">
                    </div>
                </div>
            </div>
        </form>
    </section>
<?php }?>
<?php if( isset($_POST['id_seleccionado']) ){ print_r($_POST);?>
    <section class="about" id="about">
        <form action="update_reserva.php" method="post">
        <div class="about-container">
            <div class="about-text">
                <div class="home-text">
                    <span>Formulario de modificacion de Reservas</span>
                    <input type="hidden" name="motivo" value="Modificacion de reserva">
                    <input type="hidden" name="id_reserva" value="<?php echo $_POST['id_seleccionado']?>">
                    <p>Fecha de inicio<br>
                    <input type="date" name="llegada" id="llegada" required>
                    <p>Fecha de Salida<br>
                    <input type="date" name="salida" id="salida" required>
                    <p>Seleccione el tipo de habitacion<br>
                    <?php
                        require("../habitacion/select_habitacion.php");
                    ?>
                    <p>Precio: <input type="text" id="precio" name="precio" readonly></p>
                    <input type="text" name="origen" id="origen" value="8" hidden>
                    <input type="submit">
                </div>
            </div>
        </div>
        </form>
    </section>
<?php }?>
</body>
<script src="../js/script.js"></script>
<script>
    const llegadaInput = document.getElementById('llegada');
    const salidaInput = document.getElementById('salida');
    const tipoHInput = document.getElementById('tipoH');
    const precioElement = document.getElementById('precio');

    llegadaInput.addEventListener('input', calcularPrecioTotal);
    salidaInput.addEventListener('input', calcularPrecioTotal);
    tipoHInput.addEventListener('change', calcularPrecioTotal);

    function calcularPrecioTotal() {
        const fechaLlegada = new Date(llegadaInput.value);
        const fechaSalida = new Date(salidaInput.value);
        if(tipoHInput.value == ''){
            return false;
         }
        const tipoHValue = tipoHInput.value;
        const precio = document.querySelector(`input[name="${tipoHValue}"]`).value;
        const unDia = 24 * 60 * 60 * 1000; 
        const numeroDias = Math.round((fechaSalida - fechaLlegada) / unDia);
        const precioTotal = precio * numeroDias;
        precioElement.value  = `$${precioTotal}`;
    }
</script>

</html>