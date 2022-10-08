<?php require "../php/config/validarSesion.php"; 
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comentarios: Menu</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/adminMenu.css">
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
            <h3>Comentarios</h3>
          </div>
        </nav>
        <?php
            require '../php/config/database.php';
            $redireccion=1;
            $numPosts = "SELECT * FROM comment WHERE status=1 ORDER BY datecom DESC";
            $consulta= $conn->query($numPosts);
            $idPost = ($consulta->fetchAll(PDO::FETCH_ASSOC));
            ?>
            <?php foreach ($idPost as $lisPost) { ?>
        <div class="card">
          <div class="card-header">
          <?php echo $lisPost['datecom']; ?>
          </div>
          <div class="card-body">
              <h5 class="card-title"><?php echo $lisPost["comment"]; ?></h5>
              <p class="card-text"><?php echo $lisPost["name"]; ?></p>
              <div class="input-group mb-3">
                  <form method="post" action="./aceptarComentario.php">
                      <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
                      <input type="submit" class="form-control btn btn-success" name="accion" value="Aprobar" />
                    </form>
                    <form method="post" action="./eliminarComentario.php">
                        <input type="hidden" name="id" id="id" value="<?php echo $lisPost['id']; ?>" />
                        <input type="submit"  class="form-control btn btn-danger" name="accion" value="Eliminar comentario"/>
                    </form>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>


      </div>
    </div>
  </div>
  <?php $userV = $user["id"]; 
      if($userV == 1):?>
      <script type="text/javascript" src="../js/adminmenu.js"></script>
      <?php else:?>
        <script type="text/javascript" src="../js/adminautor.js"></script>
        <?php endif;?>

  <script type="text/javascript" src="../js/adminmenu.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>