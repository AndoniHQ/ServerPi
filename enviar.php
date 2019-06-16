<?php
  //$destino="andonimola98@gmail.com";
  //$nombre= $_POST['Nombre'];
  //$correo= $_POST['Correo'];
  //$asunto= $_POST['Asunto'];
  //$mensaje= $_POST['Mensaje'];
  //$contenido= "Nombre: ".$nombre."\nCorreo:".$correo."\nAsunto: ".$asunto."\nMensaje: ".$mensaje;
  //mail($destino, $asunto, $contenido);
  //header("Location: panel.php");
  $email="andonimola98@gmail.com";
  $subject="prueba correo";
  $body="Hola, Andoni esto es una prueba.";
  $headers = 'From: youremail@mail.com' . "\r\n" .
				'Reply-To: youremail@mail.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
  mail($email, $subject, $body, $headers);
 ?>
