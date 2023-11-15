<?php
session_start();
include("../check.php");
include("../conexion.php");
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

<body onload="modificar()">
 
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
<?php 
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<pre>";
 //print_r($_POST);
 if($_POST['tipo_hab'] != ''){
    $sql="SELECT * FROM tipohabitacion where id=".$_POST['tipo_hab'];
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
        $descripcion=$row['titulo'];
    }
}
// echo "</pre>";
?>
    <section class="about" id="about">
        <form action="update_reserva.php" method="post">
            <div class="about-container">
                <div class="about-text">
                    <div class="home-text">
                        <span id="span">Ingresos de la Modificacion</span>
                        <input type="hidden" name="motivo" value="Modificacion de reserva">
                        <p id="fIniciop">Fecha de inicio</p>
                        <input type="date" name="fInicioI" id="fInicioI" value="<?php echo $_POST['fecha_ini']?>">
                        <p id="fFinp">Fecha de Salida</p>
                        <input type="date" name="fFinI" id="fFinI" value="<?php echo $_POST['fecha_fin']?>">
                        <p id="tHabip">Seleccione el tipo de habitacion
                        </p>
                        <select id="habitacion" name="tipoH">
                           <?php
                                if($_POST['tipo_hab'] != ''){
                                    echo "<option id='tipo' selected value=".$_POST['tipo_hab'].">".$descripcion."</option>";
                                }
                           ?>
                        </select>
                        <p id="pPrecio">Precio: <input type="text" id="precio" name="precio" value="<?php echo "$".$_POST['precio']?>"></p>
                    <input type="submit" id="submit">
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- <script>
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
    </script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>