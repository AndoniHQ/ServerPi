<!DOCTYPE html>
  <html lang="es" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>ERROR </title>
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/error.css">
    </head>
    <body>

      <div class="login-box">
        <img src="https://i.vimeocdn.com/portrait/10644740_300x300" class="avatar" alt="Avatar Image">

      <h1>Debe iniciar sesion para acceder</h1>

      <?php if (!empty($message)): ?>
        <p><?= $message ?></p>
      <?php endif; ?>
        <form action="login.php">
          <input type="submit" value="INICIE SESION" />
        </form>
      </div>
    </body>
  </html>
