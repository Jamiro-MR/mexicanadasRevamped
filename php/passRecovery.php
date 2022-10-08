<?php

require '../php/config/database.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mexicanadas</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="../css/login.css">
  </head>
  <body>
    <div class="overlay">
      <form action="enviarCorreo.php" method="POST">
        <div class="con">
          <header class="head-form">
            <img src="../assets/img_admin.png" class="img_1">
          </header>
          <br>
          <div class="field-set">
          <div class="infRecovery">Debes ingresar el correo registrado</div>
            <br>
            <span class="input-item">
              <i class="fa fa-user-circle"></i>
            </span>
              <input name="email" id="email" class="form-input" type="text" placeholder="Email" required>
              <br>
              <button type="submit" class="log-in">Restablecer</button>
              </form>
              <br>
          </div>
        </div>
      </form>
    </div>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>