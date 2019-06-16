<?php
  session_start();
  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }

 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ServerPi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
  </head>
  <body>

    <?php if(!empty($user)):

      header("Location: panel.php");

    else: ?>

    <div class="Index-box"></div>

    <div class="Index-box2">
    <h1>Bienvenido a ServerPi.</h1>

    <div class="buttonHolder">

    <form method="GET" action="login.php">
    <input type="submit" value="Inicie sesion">
    </form>
    <form method="GET" action="signup.php">
    <input type="submit" value="Registrate">
    </form>


    <?php endif; ?>
    </div>

    </div>
  </body>
</html>
