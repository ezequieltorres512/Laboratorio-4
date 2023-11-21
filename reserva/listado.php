<?php
session_start();
include("../check.php");
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
    <?php 
    ?>
    <div id="mayor" style='margin-top:2%'>		            
			<h2>Listado de solicitudes 
				<select name="tipo_solicitud" id="tipo_solicitud">
                <option value="0">TODAS</option>
				<option value="1">PENDIENTES</option>
				<option value="2">CONFIRMADAS</option>
				<option value="3">ELIMINADAS</option>
				</select>
                <input type="hidden" id="cliente" value="<?php if($_SESSION['tipoUser'] == 'cliente') echo $_SESSION['usuario'];?>">
			</h2>
            
			<table id="">
				<tr id="">
						<th><label class="" disabled>Nro. Reserva</label></th>
						<th><label class="" disabled>Nombre y Apellido</label></th>
						<th><label class="" disabled>Fecha inicio</label></th>
						<th><label class="" disabled>Fecha finalizacion</label></th>
						<th><label class="" disabled>Precio</label></th>
                        <th><label class="" disabled>Tipo Habitacion</label></th>
						<th><label class="" disabled>Estado</label></th>				
				</tr>
                <tr>
						<td ><input style='width:55px;' class="" id="fId" type='text' placeholder="Nro."></input></td>
						<td ><input class="" id="fPerso" type='text' placeholder="Filtro Nombre"></input></td>
						<td ><input class="" id="fInicio" type='date' placeholder="Filtro inicio"></input></td>
                        <td ><input class="" id="fFin" type='date' placeholder="Filtro fin"></input></td>
						<td ><input  style='width:65px;' class="" id="fPrecio" type='text' placeholder="Precio $$"></input></td>
                        <td ><input class="" id="fTipo" type='text' placeholder="Filtro Habitacion"></input></td>
						<td ><input  class="" id='colorfondo' disabled></input></td>				
				</tr>
	
			
		
                <tbody id="conttabla">
		
                
   
   
			
		    </table>
            <div class="ultima">		</div>	
			<footer class="footer" id="footervalor">
			<div id="totalRegistros"></div>
		</footer>
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../js/script.js"></script>
<script>
    /* pruebas maxi */
var bodyt = document.getElementById("conttabla");
var newRow;
var newCell;
function CargarTabla(){
    //alert($("#cliente").val());
    $("#conttabla").empty(); 
    $("#conttabla").append("<h2>Esperando respuesta ...</h2>");
    var request = $.ajax({
    /**
     id_reserva
    precio
    id_usuario
    apellido
    nombre
    telefono
    fecha_inicio
    fecha_fin
    habitacion
    tipoHabitacion
    adicional
    vendedor
    conocidosPor
    baja 
    */       
            type: "GET",
            url: "consulta_reserva.php",
            data: {
                tipo: $("#tipo_solicitud").val(),
                fId: $("#fId").val(),
                fPerso: $("#fPerso").val(), 
                fHabitacion: $("#fTipo").val(), 
                fInicio: $("#fInicio").val(), 
                fFin: $("#fFin").val(),
                fPrecio: $("#fPrecio").val(),
                id : $("#cliente").val(),
            },
            success: function(respuestaDelServer,estado) {
                //alert(estado+"->"+respuestaDelServer);
                $('#conttabla').empty();
                objJson=JSON.parse(respuestaDelServer);
                let isGray = true;
                objJson.planes.forEach(element => {
                    newRow = document.createElement("tr");
                    // Establecer el color de fondo alternante
                  /*  if (isGray) {
                    newRow.style.backgroundColor = "#f2f2f2";
                    } else {
                    newRow.style.backgroundColor = "#e6e6e6";
                    }*/
                    isGray = !isGray;
                    
                    newCell = document.createElement("td");
                    newCell.setAttribute("campo-dato", "id")
              //      newCell.setAttribute("style", "width:50%");
                    newCell.innerHTML = element.id;
                    newRow.appendChild(newCell)

                    newCell = document.createElement("td");
                    newCell.setAttribute("campo-dato", "nombre")
                    newCell.innerHTML = element.nombre;
                    newRow.appendChild(newCell)

                    newCell = document.createElement("td");
                    newCell.setAttribute("campo-dato", "fecha_ini")
                    newCell.innerHTML = element.fecha_inicio;
                    newRow.appendChild(newCell)
                    
                    newCell = document.createElement("td");
                    newCell.setAttribute("campo-dato", "fecha_fin")
                    newCell.innerHTML = element.fecha_fin;
                    newRow.appendChild(newCell)

                    newCell = document.createElement("td");
                    newCell.setAttribute("campo-dato", "precio")
                    newCell.innerHTML = element.precio;
                    newRow.appendChild(newCell)


                    newCell = document.createElement("td");
                    newCell.setAttribute("campo-dato", "tipo_hab")
                    newCell.innerHTML = element.titulo;
                    newRow.appendChild(newCell);

                    newCell = document.createElement("td");
                    newspan = document.createElement("span")
                    newspan.innerHTML = element.estado;
                    newspan.setAttribute("style", "background-color:"+element.color+";");
                    newCell.appendChild(newspan);
                    newCell.setAttribute("campo-dato", "estado")
                    
                    if(element.estado == 'PENDIENTE'){
                        <?php if($_SESSION['tipoUser'] != 'cliente'){ ?>
                            newImg = document.createElement("img");
                        newImg.setAttribute("src","../imagenes/eliminar.jpg");
                        newImg.setAttribute("class","icono-redireccion");
                        newImg.setAttribute("alt","Eliminar registro");
                        newImg.setAttribute("style","float:right;");
                        newImg.addEventListener("click", function() {
                        if (window.confirm("¿Seguro que quieres eliminar este registro?")) {    
                            var form = document.createElement("form");
                            form.setAttribute("method", "post");
                            form.setAttribute("action", "baja_reserva.php");

                            var input1 = document.createElement("input");
                            input1.setAttribute("type", "hidden");
                            input1.setAttribute("name", "reservas");
                            input1.setAttribute("value", element.id);
                            form.appendChild(input1);

                            document.body.appendChild(form);
                            form.submit();
                        }
                        });
                        newCell.appendChild(newImg)
                    <?php } ?>
                        
                        newImg = document.createElement("img");
                        newImg.setAttribute("src","../imagenes/editar.png");
                        newImg.setAttribute("class","icono-redireccion");
                        newImg.setAttribute("alt","Editar registro");
                        newImg.setAttribute("style","float:right;");
                        newImg.addEventListener("click", function() {

                            var form = document.createElement("form");
                            form.setAttribute("method", "post");
                            form.setAttribute("action", "solicitud_modif.php");

                            var input1 = document.createElement("input");
                            input1.setAttribute("type", "hidden");
                            input1.setAttribute("name", "fecha_ini");
                            input1.setAttribute("value", element.fecha_inicio);
                            form.appendChild(input1);

                            var input2 = document.createElement("input");
                            input2.setAttribute("type", "hidden");
                            input2.setAttribute("name", "fecha_fin");
                            input2.setAttribute("value", element.fecha_fin);
                            form.appendChild(input2);

                            var input3 = document.createElement("input");
                            input3.setAttribute("type", "hidden");
                            input3.setAttribute("name", "id_reserva");
                            input3.setAttribute("value", element.id);
                            form.appendChild(input3);

                            var input4 = document.createElement("input");
                            input4.setAttribute("type", "hidden");
                            input4.setAttribute("name", "tipo_hab");
                            input4.setAttribute("value", element.tipoHabitacion);
                            form.appendChild(input4);

                            var input5 = document.createElement("input");
                            input5.setAttribute("type", "hidden");
                            input5.setAttribute("name", "precio");
                            input5.setAttribute("value", element.precio);
                            form.appendChild(input5);

                            document.body.appendChild(form);
                            form.submit();
                        });
                        newCell.appendChild(newImg)
                    }    

                    newRow.appendChild(newCell);

            /*      newCell = document.createElement("td");
                    newCell.setAttribute("campo-dato", "vinculo")
                    newRow.appendChild(newCell)
                    asd = document.createElement("a");
                    asd.setAttribute("href","datos_visualizar.php?cod="+codigo_tipo+"&id="+id_operacion),
                    asd.setAttribute("target","_blank")
                    asd.innerHTML = "Visualizar solicitud";
                    newCell.appendChild(asd)*/


                    bodyt.appendChild(newRow);
                    
                });//cierra for each
                if(objJson.cuenta>0){
                $("#totalRegistros").html("Cantidad total de registros: " + objJson.cuenta );
                }else{
                $("#totalRegistros").html("<h2 style='padding: 17%;'>NO EXISTEN DATOS PARA LISTAR</h2>");
                }
            }//cierra funcion asignada al success
        });//cierra ajax
    }

    $('#fId').on("keyup", function() {
    CargarTabla();
    });
    $("#fPerso").on("keyup", function() {
    CargarTabla();
    });
    $("#fTipo").on("keyup", function() {
    CargarTabla();
    });
    $("#fInicio").change(function() {
    CargarTabla();
    });
    $("#fFin").change(function() {
    CargarTabla();
    });
    $("#fPrecio").on("keyup", function() {
    CargarTabla();
    });
    $("#tipo_solicitud").change(function() {
    CargarTabla();
    });
    document.addEventListener("DOMContentLoaded", function() {
        CargarTabla();
        ajustarAnchoColumnas();

        window.addEventListener("resize", function() {
            ajustarAnchoColumnas();
        });

        function ajustarAnchoColumnas() {
            const contTabla = document.getElementById('conttabla');
            const filas = contTabla.getElementsByTagName('tr');

            // Itera sobre las filas y ajusta el ancho de cada celda.
            for (let i = 0; i < filas.length; i++) {
                const celdas = filas[i].getElementsByTagName('td');

                for (let j = 0; j < celdas.length; j++) {
                    celdas[j].style.width = 'auto';
                }
            }
        }
    });

</script>

</html>