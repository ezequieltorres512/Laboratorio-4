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
        <li><a href="#home">Inicio</a></li>
        <li><a href="#contact">Contacto</a></li>
        <div class="bx bx-moon" id="darkmode"></div>
    </ul>
</header>
<center>
<?php

if(isset($_POST['user'])){//DAR DE ALTA USUARIO y validar con mail
      /*   FUNCION */
      function generarNumeroAleatorio() {
            $numero = '';
            for ($i = 0; $i < 9; $i++) {
                  $digito = rand(0, 9); 
                  $numero .= $digito; 
            }
            return $numero;
      }
      /*termina function */
      include_once("../conexion.php");
      $user = $_POST["user"];
      $pw = $_POST["pw"];
      $apellido = $_POST["ape"];
      $nombre = $_POST["nom"];
      $direccion = '';
      $telefono = null;
      if(isset($_POST["dir"])){
            $direccion = $_POST["dir"];
      }
      if(isset($_POST["tel"])){
            $telefono = $_POST['tel'];
      }
      $contrasenaCifrada = md5($pw);
      $palabra_clave = $_POST["clave_palabra"];
      $numeroAleatorio = generarNumeroAleatorio();
      $adicional = 0;
      $vendedor=0;

      $query = mysqli_query($conn,"INSERT INTO cliente (clave,email,fecha_registro,estado,apellido, nombre , direccion, telefono) VALUES ('$contrasenaCifrada','$user',NOW(),1,'$apellido','$nombre', '$direccion', $telefono)");

                                               
      if($query){
            require("../mensajes/redireccion_mensaje.php");
      }else{
            echo mysqli_error($conn);
      }
}else{//Formulario para llenar alta
?>
      <form id = 'alta_usr' action="alta_usuario.php" method="post">
      <div class="about-container">
            <div class="about-text">
                  <div class="home-text">
                        <span>Formulario de alta nuevo usuario</span>
                        <input type="hidden" name="motivo" value="Alta de usuario">
                        <p>Correo electr&oacute;nico<br>
                        <input type="email" name="user" id="user" required>
                        <p>Apellido<br>
                        <input type="text" name="ape" id="ape" required>
                        <p>Nombre<br>
                        <input type="text" name="nom" id="nom" required>
                        <p>Direccion<br>
                        <input type="text" name="dir" id="dir">
                        <p>Telefono<br>
                        <input type="number" name="tel" id="tel">
                        <p>Contrase&nacute;a<br>
                        <input type="password" name="pw" id="pw">
                        <p>Repita la contrase&nacute;a<br>
                        <input type="password" name="pw2" id="pw2">
      <!--                   <p>Palabra para recupero de clave<br>
                        <input type="text" name="clave_palabra" id="clave_palabra"> -->
                        <input type="submit">
                  </div>
            </div>
      </div>
      </form>
      </center>   
      </body>
      <script>
      document.getElementById("alta_usr").addEventListener("submit", function(event) {
      var password1 = document.getElementById("pw").value;
      var password2 = document.getElementById("pw2").value;

      if (password1 !== password2) {
            alert("Los campos no coinciden. Por favor, intentelo de nuevo.");
            event.preventDefault(); 
      }
      });
      </script>
      <?php
}
      ?>
<script src="../js/script.js"></script>