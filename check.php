<?php
if(!isset($_SESSION['usuario'])){
    echo "<script> alert('Error Login');window.location= 'http://localhost:8080/index.php' </script>";
    //header("Location: http://localhost:8080/inicio.php");
}
?> 