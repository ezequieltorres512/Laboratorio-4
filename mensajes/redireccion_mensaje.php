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
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../sobrenosotros.php#galeria">Galeria</a></li>
            <li><a href="../sobrenosotros.php">Sobre Nosotros</a></li>
            <li><a href="../index.php#contact">Contacto</a></li>
            <div class="bx bx-moon" id="darkmode"></div>
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
