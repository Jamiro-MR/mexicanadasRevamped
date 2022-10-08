<?php

  session_start();

  require '../php/config/database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM admins where email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if(is_countable($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id']=$results['id'];
      header('Location: ../php/adminTodos.php');
    }else{
      $message = 'Contrasena incorrecta.';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mexicanadas</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="../css/login.css">
    <link href="../assets/favicon.ico" rel="icon">
  </head>
  <body>
    <?php if (!empty($message)) : ?>

      <?php endif; ?>
    <div class="overlay">
      <form action="login.php" method="POST">
        <div class="con">
          <header class="head-form">
            <img src="../assets/img_admin.png" class="img_1">
            <p><?=$message ?></p>
          </header>
          <br>
          <div class="field-set">
            <span class="input-item">
              <i class="fa fa-user-circle"></i>
            </span>
              <input name="email" class="form-input" type="text" placeholder="Email" required>
              <br>
              <span class="input-item">
                <i class="fa fa-key"></i>
              </span>
              <input name="password" class="form-input" type="password" id="pwd" placeholder="Password" required>
              <span>
                <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
              </span>
              <br>
              <button type="submit" class="log-in">Iniciar sesion</button>
              <br>
              <button role="link" class="log-in" onclick="window.location='passRecovery.php'">Recuperar contraseña</button>
              <br>
          </div>
        </div>
      </form>
    </div>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>