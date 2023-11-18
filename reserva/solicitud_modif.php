<?php
session_start();
include("../check.php");
include("../conexion.php");
//include_once("../desuso/prueba.php");
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
    <a href="../index.php" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">

        <li><a href="../index.php">Inicio</a></li>

        <!-- <li><a href="#about">Reservas</a></li>
        <li><a href="#skills">Instalaciones</a></li>
        <li><a href="#services">Servicios</a></li>
        <li><a href="#contact">Contacto</a></li> -->
            <?php if(isset($_SESSION['usuario'])){?>   
                <li><a href="../index.php#reservas">Reservas</a></li>
            <?php } ?>
            <li><a href="../sobrenosotros.php#galeria">Galeria</a></li>
            <li><a href="../sobrenosotros.php#">Sobre Nosotros</a></li>
            <?php if($_SESSION["tipoUser"] == "cliente"){?>
                <li><a href="../index.php#contact">Contacto</a></li>
            <?php } ?>
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
                        <input type="hidden" name="id_seleccionado" value="<?php echo $_POST['id_reserva']; ?>">
                        <?php $fechamin = date("Y-m-d"); ?>
                        <p id="fIniciop">Fecha de inicio</p>
                        <input type="date" name="fInicioI" id="fInicioI" min= "<?php echo $fechamin ?>" value="<?php echo $_POST['fecha_ini']?>">
                        <p id="fFinp">Fecha de Salida</p>
                        <input type="date" name="fFinI" id="fFinI" min= "<?php echo $fechamin ?>" value="<?php echo $_POST['fecha_fin']?>">
                        <p id="tHabip">Seleccione el tipo de habitacion
                        </p>
                        <select id="habitacion" name="tipoH">
                           <?php
                           
                                if($_POST['tipo_hab'] != ''){
                                    echo "<option id='tipo' selected value=".$_POST['tipo_hab'].">".$descripcion."</option>";
                                }
                           ?>
                        </select>
                         <?php
                         //print_r($_POST);
                        include("../habitacion/precios.php");
                            ?>
                        <p id="pPrecio">Precio: <input type="text" id="precio" name="precio" value="<?php echo "$".$_POST['precio']?>"></p>
                        <?php if($_SESSION['tipoUser'] != 'cliente'){?>
                        <p>Seleccione Habitacion si desea asignar</p>
                            <select id="disponibilidad" name="habitacion_asignada">
                        </select>
                        <p>Seleccione como nos conocio<br>
                        <?php
                              require("../publicidad/publicidad.php");
                        }?>    
                    <input type="submit" id="submit" style="margin-top: 5%;">
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script>
    const fInicioInput = document.getElementById('fInicioI');
    const fFinInput = document.getElementById('fFinI');
    const habitacionSelect = document.getElementById('habitacion');
    const precioInput = document.getElementById('precio');

    fInicioInput.addEventListener('input', calcularPrecio);
    fFinInput.addEventListener('input', calcularPrecio);
    habitacionSelect.addEventListener('change', calcularPrecio);

    function calcularPrecio() {
        const fechaInicio = new Date(fInicioInput.value);
        const fechaFin = new Date(fFinInput.value);

        const tipoHabitacionValue = habitacionSelect.value;
        const precio = document.querySelector(`input[name="${tipoHabitacionValue}"]`).value;

        const unDia = 24 * 60 * 60 * 1000; 
        const numeroDias = Math.round((fechaFin - fechaInicio) / unDia);

        const precioTotal = precio * numeroDias;

        precioInput.value = `$${precioTotal}`;
        cargar_habitacion_disponible();
    }
    function cargar_habitacion_disponible() {
        $("#disponibilidad").empty();
        var select = document.getElementById('disponibilidad');
        var option = document.createElement("option"); 
        select.add(option);
        var request = $.ajax({
            type: "GET",
            url: "disponibilidad.php",
            data: {
                fInicioI: $("#fInicioI").val(),
                fFinI: $("#fFinI").val(),
                habitacion : $("#habitacion").val(),
            },
            success: function(respuestaDelServer,estado) {
            //alert(respuestaDelServer,estado);
            //  alert("hola");
                var habitaciones = new Array();
                objJson=JSON.parse(respuestaDelServer);
                objJson.planes.forEach(element => {
                    habitaciones.push(element.id+"|Piso: "+element.piso+"- Puerta: "+element.puerta);
                });//cierra for each
                habitaciones.sort();
                //alert(habitaciones);
            addOptions("disponibilidad", habitaciones);
            }//cierra funcion asignada al success
        });//cierra ajax
    }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>
