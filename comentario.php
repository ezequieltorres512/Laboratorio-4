<?php      
/*termina function */
      include_once("conexion.php");
      $persona = $_POST["nombre"];
      $correo = $_POST["correo"];
      $comentario = $_POST["comentario"];

      $query = mysqli_query($conn,"INSERT INTO comentarios (persona,correo,comentario) VALUES ('$persona','$correo','$comentario')");

                                               
      if($query){
            require("redireccion_mensaje.php");
      }else{
            echo mysqli_error($conn);
      }


?>