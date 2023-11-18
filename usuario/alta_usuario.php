<?php
    session_start();
      //require("../check.php");      
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

<body onload="validarContra()">
 
<header>
    <a href="../index.php" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="#contact">Contacto</a></li>
        <div class="bx bx-moon" id="darkmode"></div>
    </ul>
</header>
<center>
<?php
// echo "<br>";
// echo "<br>";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
if(isset($_POST['user']) && $_POST['motivo'] == "Alta de usuario"){//DAR DE ALTA USUARIO y validar con mail
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
      // echo "<pre>";
      // print_r($_POST);
      // echo "</pre>";
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
      $conocidosPor = $_POST['canal_difusion'];
      $contrasenaCifrada = md5($pw);
      //$palabra_clave = $_POST["clave_palabra"];
      $numeroAleatorio = generarNumeroAleatorio();
      $adicional = 0;
      $vendedor=0;

      $query = mysqli_query($conn,"INSERT INTO cliente (clave,email,fecha_registro,estado,apellido, nombre , direccion, telefono, conocidosPor) VALUES ('$contrasenaCifrada','$user',NOW(),1,'$apellido','$nombre', '$direccion', $telefono, $conocidosPor)");

                                               
      if($query){
            require("../mensajes/redireccion_mensaje.php");
      }else{
            echo mysqli_error($conn);
      }
}else if($_POST['motivo'] == "Alta de empleado" && $_POST['empleado'] == "ok"){
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
      $puesto = $_POST['puesto'];
      $contrasenaCifrada = md5($pw);
      $numeroAleatorio = generarNumeroAleatorio();
      $adicional = 0;
      $vendedor=0;

      $query = mysqli_query($conn,"INSERT INTO empleado (clave, email, fecha_registro, estado, apellido, nombre, puesto) VALUES ('$contrasenaCifrada','$user',NOW(),1,'$apellido','$nombre', '$puesto')");

                                               
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
                        <p>Seleccione como nos conocio<br>
                        <?php
                              require("../publicidad/publicidad.php");
                        ?>
                        <input type="submit" style="margin-top: 8%;">
                  </div>
            </div>
      </div>
      </form>
      </center>   
      </body>
      <?php
}
      ?>
<script src="../js/script.js"></script>