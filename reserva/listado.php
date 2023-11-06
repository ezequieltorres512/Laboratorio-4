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
<section class="about" id="about">

    <div id="mayor" style='margin-top:2%'>		            
			<h2>Listado de solicitudes 
				<select name="tipo_solicitud" id="tipo_solicitud">
                <option value="0">TODAS</option>
				<option value="1">PENDIENTES</option>
				<option value="2">CONFIRMADAS</option>
				<option value="3">ELIMINADAS</option>
				</select>
				<button id="mostrar"><label for="mostrar"></label><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
				<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
				<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
				</svg></button>
			</h2>

			<table id="">
				<tr id="">
						<th><button class="" disabled>ID</button></th>
						<th><button class="" disabled>Nombre y Apellido</button></th>
						<th><button class="" disabled>Fecha inicio</button></th>
						<th><button class="" disabled>Fecha finalizacion</button></th>
						<th><button class="" disabled>Precio</button></th>
                        <th><button class="" disabled>Tipo Habitacion</button></th>
						<th><button class="" disabled>Estado</button></th>				
				</tr>
                <tr>
						<td ><input class="" id="fId" type='text' placeholder="Filtro ID"></input></td>
						<td ><input class="" id="fPerso" type='text' placeholder="Filtro Nombre"></input></td>
						<td ><input class="" id="fInicio" type='date' placeholder="Filtro inicio"></input></td>
                        <td ><input class="" id="fFin" type='date' placeholder="Filtro fin"></input></td>
						<td ><input class="" id="fPrecio" type='text' placeholder="Filtro Precio $$"></input></td>
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

</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../js/script.js"></script>
<script>
    /* pruebas maxi */
var bodyt = document.getElementById("conttabla");
var newRow;
var newCell;
function CargarTabla(){
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
                fId: $("#fId").val(),
                fPerso: $("#fPerso").val(), 
                fHabitacion: $("#fTipo").val(), 
                fInicio: $("#fInicio").val(), 
                fFin: $("#fFin").val(),
                fPrecio: $("#fPrecio").val(), 
            },
            success: function(respuestaDelServer,estado) {
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
                    newCell.innerHTML = element.tipoHabitacion;
                    newRow.appendChild(newCell);

                      newCell = document.createElement("td");
                    newCell.setAttribute("campo-dato", "estado")
                    newCell.innerHTML = '';//ACA MODIFICAR CUANDO TENGA UN ESTADO
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
    var Cargar = document.getElementById("mostrar");
    Cargar.onclick = function() {
      CargarTabla();
    }

</script>

</html>