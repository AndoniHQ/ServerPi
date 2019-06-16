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
    <link rel="stylesheet" href="assets\css\ejecucion.css">
  </head>
  <body>
    <header>

      <?php require 'partials/header.php' ?>

    </header>

    <?php

      $html="";

      if( isset( $_POST[ 'Submit' ]  ) ) {
	    // Get input
	    $target = $_REQUEST[ 'ip' ];
	    // Determine OS and execute the ping command.
	    if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
		  // Windows
		  $cmd = shell_exec( 'ping  ' . $target );
	    }
	    else {
		  // *nix
		  $cmd = shell_exec( 'ping  -c 4 ' . $target );
	   }
	    // Feedback for the end user
	     $html .= "<pre>{$cmd}<pre>";
     }
    ?>
    <section id="codigo">
      <form name="ping" action="ejecucion.php" method="post">
      <h1>Injección de código</h1>
        <label for=""><p align="center">Introduzca la dirección IP: </p></label>
      	<label for="Texto"><input type="text" name="ip" size="30"></label>
      	<label for="Boton"><input type="submit" name="Submit" value="Ping" id="boton"></label>
      	</form>
        <div class="consola">
          <?php echo "$html" ?>
        </div>
    </section>
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
