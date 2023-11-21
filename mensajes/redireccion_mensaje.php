<?php
   //   echo"<pre>";print_r($_POST);echo"</pre>";
      $mensaje=$_POST['motivo'];
     // echo "El mensaje es: $mensaje";
     
?>
<!DOCTYPE html>
<html>
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

            <li><a href="#">Inicio</a></li>
            <?php if(isset($_SESSION['usuario'])){ ?>   
            <li><a href="../index.php#reservas">Reservas</a></li>
            <?php if ($_SESSION["tipoUser"] == "admin"){ ?>
            <li><a href="../index.php#control">Control</a></li>
            <?php } } ?>
            <?php if( !isset($_SESSION["tipoUser"]) || ( isset($_SESSION["tipoUser"]) && $_SESSION["tipoUser"] == "cliente")){ ?>
            <li><a href="../index.php#sobre_nosotros">Nosotros</a></li>
            <li><a href="../index.php#galeria">Galeria</a></li>
            <li><a href="../index.php#contact">Contacto</a></li>
            <?php } ?>
            <div class="bx bx-moon" id="darkmode"></div>
            <?php if(isset($_SESSION['usuario'])){ ?>
            <li><a href="usuario/controlador_cerrar_session.php">Cerrar Sesion</a></li>
            <?php }
            if(!isset($_SESSION['usuario'])){
            // print_r($_SESSION);?>
                <li><a href="inicio.php">Iniciar Sesion</a></li>
            <?php } ?>
        </ul>
    </header>
      <section class="home" id="home">
            <div class="home-img">
                  <img src="../imagenes/penthouse.jpg" alt="foto penthouse">
            </div>
            <div class="home-text">

                  <span><?php echo $mensaje ?> exitosa, en breve nos comunicaremos con usted</span>

                  <parse_str>Redireccionando a la p&aacute;gina de inicio en 3 segundos...</parse_str>
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

<script>
setTimeout(function() {
    var variablePost = '<?php echo $_POST['motivo']; ?>';
    if (variablePost === 'Alta de usuario') {
        window.location.href = '../index.php';
    } else {
        window.location.href = '../index.php';
    }
}, 5000);
</script>
</body>
</html>
