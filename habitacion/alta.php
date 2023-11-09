<?php
    session_start();
    include_once("../conexion.php");
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
    <a href="../inicio.php" class="logo">La 7ma <span>Hotel</span></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="#home">Inicio</a></li>
        <li><a href="#contact">Contacto</a></li>
        <div class="bx bx-moon" id="darkmode"></div>
    </ul>
</header>
<center>
<?php
print_r($_POST);
//exit();

echo "<br>";

if(isset($_POST['habi']) && $_POST['motivo'] == "Alta de habitacion"){//DAR DE ALTA USUARIO y validar con mail
    $piso = $_POST["piso"];
    $puerta = $_POST["puerta"];
    $tipoH = $_POST["tipoH"];
    $descripcion = $_POST["descripcion"];
    $sql = "INSERT INTO habitacion (piso, puerta, tipo_habitacion, reservado, descripcion) VALUES ($piso, $puerta, $tipoH, 0, '$descripcion')";
    $query = mysqli_query($conn,$sql);                                    
    if($query){
        require("../mensajes/redireccion_mensaje.php");
    }else{
        echo mysqli_error($conn);
    }
}else {//if($_POST['motivo'] == "Alta de tipo de habitacion" && $_POST['tipoHabi'] == "ok")
    $precio = $_POST["precio"];
    $titulo = $_POST["titulo"];
    $toilets = $_POST["toilets"];
    $metros = $_POST["metros"];
    $descCamas = $_POST["descCamas"];
    $sql = "INSERT INTO tipohabitacion (precio, titulo, metros, cantBaños, descripcionCamas) VALUES ($precio, '$titulo', $metros, $toilets, '$descCamas')";
    //   echo "<br>";
    //   echo "<br>";
    //   echo "<br>";
    //   echo "<pre>"; 
    //   print_r($_POST);
    //   echo "</pre>"; 
    //   echo "$sql\n";
    $query = mysqli_query($conn,$sql);
                                                
    if($query){
            require("../mensajes/redireccion_mensaje.php");
    }else{
            echo mysqli_error($conn);
    }
}