<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: panel.php');
  }

  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);


    if ($results && count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header('Location: panel.php');
    } else {
      $message = 'Usuario o contraseña incorrectos';
    }
  }
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login ServerPi</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
  </head>
  <body>

    <div class="login-box">
      <img src="https://i.vimeocdn.com/portrait/10644740_300x300" class="avatar" alt="Avatar Image">

    <h1>Inicie sesión</h1>

    <?php if (!empty($message)): ?>
      <p><?= $message ?></p>
    <?php endif; ?>

    <form class="" action="login.php" method="post">
      <!-- Input usuario -->
      <label for="email">Email</label>
      <input type="text" name="email" placeholder="Introduzca su email...">
      <!-- Input Contraseña -->
      <label for="password">Contraseña</label>
      <input type="password" name="password" placeholder="Introduzca su contraseña">
      <input type="submit" name="" value="Enviar">
      <!-- Links -->
      <div class="linksholder">
        <a href="signup.php">¿No tienes una cuenta?</a><br>
        <a href="index.php">Volver al Inicio</a>
      </div>

    </form>

  </div>
  </body>
</html>
