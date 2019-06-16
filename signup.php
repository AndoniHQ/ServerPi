<?php
  require 'database.php';

//Comprobamos que los campos no estan vacios
if (!empty($_POST['email']) && !empty($_POST['password'])){
  //Comprobamos que no este registrado.
  $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

    if ($results && count($results) > 0) {
      $message = 'Este usuario ya esta registrado.';
    } else {

      //Si no existe creamos la consulta para añadirlo
      //Comprobamos si las contraseñas coinciden
      if ($_POST['confirm_password']===$_POST['password']){
        $sql = "INSERT INTO users (email,password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

          if ($stmt->execute()) {
          $message = 'Usuario creado correctamente.';
          } else {
          $message = 'Ha ocurrido un error al crear el usuario';
          }
      } else {
          $message = 'Las contraseñas no coinciden';
      }
    }
  }else{
    $message="Inserte un correo valido";
  }
}


  ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Regístrate</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/signup.css">
  </head>
  <body>

    <div class="signup-box">
      <img src="https://i.vimeocdn.com/portrait/10644740_300x300" class="avatar" alt="Avatar Image">

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Regístrate</h1>

    <form class="" action="signup.php" method="post">
      <!-- Input usuario -->
      <label for="email"></label>
      <input type="text" name="email" value=""  placeholder="Introduzca su email...">
      <!-- Input Contraseña -->
      <label for="password"></label>
      <input type="password" name="password" value="" placeholder="Introduzca su contraseña">
      <input type="password" name="confirm_password" value="" placeholder="Confirme su contraseña">
      <input type="submit" name="" value="Enviar">
      <!-- Input Links -->
      <div class="linksholder">
      <a href="login.php">¿Ya estas registrado? Inicia sesión.</a>
      </div>

    </form>

    </div>
  </body>
</html>
