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
<?php if( !isset($_POST['id_seleccionado']) ){
        ?>
    <section class="about" id="about">
        <form action="update_reserva.php" method="post">
            <div class="about-container">
                <div class="about-text">
                    <div class="home-text">
                        <span>Modificacion de Reservas</span>
                        <!-- <input type="hidden" name="id_seleccionado" value="Alta de reserva"> -->
                        <p>Seleccione el ID de la reserva</p>
                        <?php
                            require("select_reservas.php");
                        ?>
                        <p>Fecha de Inicio</p>
                        <input type="checkbox" name="fInicio" id="fInicio" onchange="habilitarInput('fInicio')">
                        <p>Fecha de Salida</p>
                        <input type="checkbox" name="fFin" id="fFin" onchange="habilitarInput('fFin')">
                        <p>Tipo de Habitacion</p>
                        <input type="checkbox" name="tHabi" id="tHabi" onchange="habilitarInput()">
                    </div>
                </div>
                <div class="about-text">
                    <div class="home-text">
                        <span id="span" hidden>Ingresos de la Modificacion</span>
                        <input type="hidden" name="motivo" value="Modificacion de reserva">
                        <p id="fIniciop" hidden>Fecha de inicio</p>
                        <input type="date" name="fInicioI" id="fInicioI" hidden>
                        <p id="fFinp" hidden>Fecha de Salida</p>
                        <input type="date" name="fFinI" id="fFinI" hidden>
                        <p id="tHabip" hidden>Seleccione el tipo de habitacion
                        <?php
                            require("../habitacion/select_habitacion.php");
                        ?></p>
                        <p id="pPrecio" hidden>Precio: <input type="text" id="precio" name="precio" hidden></p>
                    <input type="submit" id="submit" hidden>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script>
    function habilitar() {
        var submit = document.getElementById('submit');
        var span = document.getElementById('span');
        var checkbox1 = document.getElementById('tHabi');
        var checkbox2 = document.getElementById('fInicio');
        var checkbox3 = document.getElementById('fFin');

        submit.hidden = !(checkbox1.checked || checkbox2.checked || checkbox3.checked);
        span.hidden = !(checkbox1.checked || checkbox2.checked || checkbox3.checked);
    }
    function habilitarInput(inputId) {            
       if(inputId){ var checkbox1 = document.getElementById(inputId);
        var input = document.getElementById(inputId+"I");
        var p = document.getElementById(inputId+"p");

        input.hidden = !checkbox1.checked;
        p.hidden = !checkbox1.checked;
    }else{
        var checkbox3 = document.getElementById('tHabi');
        var inputTH = document.getElementById("tipoH");
        var pTH = document.getElementById("tHabip");
        var precio = document.getElementById("precio");
        var pPrecio = document.getElementById("pPrecio");

        inputTH.hidden = !checkbox3.checked;
        pTH.hidden = !checkbox3.checked;
        pPrecio.hidden = !checkbox3.checked;
        precio.hidden = !checkbox3.checked;
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
    }
        habilitar();
    }
    </script>
    <script src="../js/script.js"></script>
<?php }?>
</body>
</html>