<?php

session_start();

if (isset($_SESSION['user_id'])) {
}else {
      header('Location: Error.php');
}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contacto</title>
    <link rel="stylesheet" href="assets\css\fontello.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\menu.css">
    <link rel="stylesheet" href="assets\css\scrollbar.css">
    <link rel="stylesheet" href="assets\css\panel.css">
    <link rel="stylesheet" href="assets\css\perfil.css">
    <link rel="stylesheet" href="assets\css\contacto.css">
  </head>
  <body>
    <header>

      <?php require 'partials/header.php' ?>

    </header>
      <div class="contacto">
        <form action="enviar.php" method="post">
          <h2>CONTACTO</h2>
          <h3>Asegurese de rellenar todos los campos.</h3>
          <label for="Nombre">Nombre:</label>
          <input type="text" name="Nombre" placeholder="Introduzca su nombre." required>
          <label for="Correo">Correo:</label>
          <input type="text" name="Correo" placeholder="Introduzca su correo." required>
          <label for="Asunto">Asunto:</label>
          <input type="text" name="Mensaje" placeholder="Aporte un asunto del mensaje" required>
          <label for="">Mensaje:</label>
          <textarea name="Mensaje"></textarea>
          <input type="submit" value="ENVIAR" id="boton">
        </form>
      </div>

    <footer>
      <div class="contenedor">
        <p class="copy">ServerPi &copy; 2019</p>
        <div class="sociales">
          <a target="_blank" class="icon-facebook-squared" href="#"></a>
          <a target="_blank" class="icon-twitter" href="https://twitter.com/andonihq98?lang=es"></a>
          <a target="_blank" class="icon-instagram" href="#"></a>
          <a target="_blank" class="icon-adult" href="https://andoni98.github.io/AndoniHQ/#"></a>
        </div>
      </div>
    </footer>
  </body>
</html>
