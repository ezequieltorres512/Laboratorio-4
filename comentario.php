<?php      
session_start();
/*termina function */
      include_once("conexion.php");
      $user = $_POST["user"];
      $pw = $_POST["pw"];
      $contrasenaCifrada = md5($pw);
      $palabra_clave = $_POST["clave_palabra"];
      $numeroAleatorio = generarNumeroAleatorio();
      $adicional = 0;
      $vendedor=0;

      $query = mysqli_query($conn,"INSERT INTO usuarios (clave,fecha_registro,email,estado,cod_desbloqueo) VALUES ('$contrasenaCifrada',NOW(),'$user',1,$numeroAleatorio)");

                                               
      if($query){
            require("redireccion_mensaje.php");
      }else{
            echo mysqli_error($conn);
      }


?>