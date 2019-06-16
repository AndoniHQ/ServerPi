
<?php

session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT * FROM users WHERE id=:id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

}else {
      header('Location: Error.php');
}


if (!empty($_POST['Nombre']) && !empty($_POST['Usuario']) && !empty($_POST['Sexo']) && !empty($_POST['Nacimiento'])){

  $nombre=$_POST['Nombre'];
  $usuario=$_POST['Usuario'];
  $sexo=$_POST['Sexo'];
  $nacimiento=$_POST['Nacimiento'];

        $sql = "UPDATE users SET nombre=:nombre, usuario=:usuario, sexo=:sexo, nacimiento=:nacimiento WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':nacimiento', $nacimiento );
        $stmt->bindParam(':id', $_SESSION['user_id']);
        header("Refresh:1");


          if ($stmt->execute()) {
          $message = 'Datos actualizados corrctamente.';
          } else {
          $message = 'Ha ocurrido un error al actualizar los datos';
          }
} else {
  $message="";
}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="assets\css\fontello.css">
    <link rel="stylesheet" href="assets\css\panel.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\menu.css">
    <link rel="stylesheet" href="assets\css\perfil.css">
    <link rel="stylesheet" href="assets\css\scrollbar.css">
  </head>
  <body>
    <header>

      <?php require 'partials/header.php' ?>

    </header>
    <div class="perfil">
      <div class="formulario">
        <h1>
          Bienvenido <?php echo $results['email'] ?>. <br>
        </h1>
        <p>Esta es la pagina principal de tu perfil. <br> <br>
          Aqui puedes actulizar la informacion del mismo cuando quieras. Algunos datos solo son de muestra. <br>
          Asegurate de que rellenas todos los campos antes de actualizar los datos, de lo contrario los datos no se actualizaran. <br>

        </p>

        <form class="" action="perfil.php" method="post">
          <label for="Nombre">Nombre completo</label>
          <input type="text" name="Nombre" placeholder="Introduzca su nombre completo" value="<?php echo $results['nombre'] ?>">
          <label for="usuario">Nombre de usuario</label>
          <input type="text" name="Usuario" placeholder="Introduzca el nombre de usuario" value="<?php echo $results['usuario'] ?>">
          <label for="email">Email</label>
          <input type="text" name="email" placeholder="Introduzca su email" value="<?php echo $results['email'] ?>" readonly="readonly">
          <label for="sexo">Género</label>
          <div class="radio">
            <label for="sexo"><input type="radio" name="Sexo" value="Hombre" <?php if($results['sexo'] == 'Hombre'){echo 'checked';} ?>>Hombre</label>
            <label for="sexo"><input type="radio" name="Sexo" value="Mujer" <?php if($results['sexo'] == 'Mujer'){echo 'checked';}  ?>>Mujer</label>
          </div>
          <label for="Nacimiento">Fecha de Nacimiento:</label>
          <input type="date" name="Nacimiento" value="<?php echo $results['nacimiento'] ?>">
          <label for="Creacion">Fecha de creación del usuario: <?php echo $results['creacion'] ?></label>
          <button type="submit" name="actualizar" id="boton">Actualizar datos</button>
            <p>
            <?php
              echo $message;
            ?>
           </p>
        </form>

      </div>
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
