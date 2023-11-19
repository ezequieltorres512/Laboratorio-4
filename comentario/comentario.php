<?php      
/*termina function */
      include_once("../conexion.php");
      $persona = $_POST["nom"];
      $correo = $_POST["correo"];
      $comentario = $_POST["comentario"];

      /*envio de mail
      $destino="admin@admin";
      $asunto="Contacto desde el sitio";
      $mensaje="Nombre: ".$persona." Email: ".$correo." Mensaje: ".$comentario;
      $header="From: ".$persona."<".$correo.">";
      $enviado = mail($destino,$asunto,$mensaje,$header);
      if($enviado == true){
      	echo "Su mensaje ha sido enviado.";
      }else{
      	echo "Hubo un error en el envio del mail.";
      }
      */
      $query = mysqli_query($conn,"INSERT INTO comentarios (persona,correo,comentario) VALUES ('$persona','$correo','$comentario')");

      
                                               
      if($query){
            require("../mensajes/redireccion_mensaje.php");
      }else{
            echo mysqli_error($conn);
      }


?>
