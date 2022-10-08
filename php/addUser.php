<?php require "../php/config/validarSesion.php"; 
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MEXICANADAS</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/adminNuevoArticulo.css">
  <link rel="stylesheet" href="../css/adminMenu.css"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link href="../assets/favicon.ico" rel="icon">
</head>
<body>
<div>
    <!-- Sidebar  -->
    <div class="site-sidebar"> 
      <?php $userV = $user["id"]; 
      if($userV == 1):?>
        <nav class="scroller"> <!-- Menu --> <div id="menu"></div></nav>
        <?php else:?>
          <nav class="scroller"> <!-- Menu --> <div id="menuautor"></div></nav>
          <?php endif;?>
    </div>

    <!-- Page Content  -->
    <div class="site-heading">
       <div class="margin"> <!-- Margin 5px y padding 5px -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary">
          <div class="container-fluid">
            <h3>Nuevo administrador</h3>
          </div>
        </nav>
        <div class="container-sm">
          <div class="row">
          <form method="post" action="registro.php" enctype="multipart/form-data">
            <div class="grid">  <!-- Columna -->             

              <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name='name' id="name" required>
                <label for="" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" name='mail' id="mail" required>
                <label for="" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name='pass' id="pass" required>
                <label for="" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" name='pass_confirm' id="pass_confirm" required>
                <br>

                <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                      <input type="submit" name="submit" class="btn btn-sm btn-success" value="Registrar">
            </form>
              </div>

              </div>
            </div>
            <div class="col-sm-12 col-md-6">  <!-- Columna --> 
              <div class="mb-3"></div>
            </div>
          </div>  
        </div>          
      </div>
    </div>
  </div>
</body>
<?php $userV = $user["id"]; 
      if($userV == 1):?>
      <script type="text/javascript" src="../js/adminmenu.js"></script>
      <?php else:?>
        <script type="text/javascript" src="../js/adminautor.js"></script>
        <?php endif;?>
  <script src="../js/bootstrap.bundle.min.js"></script>
</html>