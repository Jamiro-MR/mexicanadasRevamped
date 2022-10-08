<?php require "../php/config/validarSesion.php"; 
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borradores: Menu</title>
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
            <h3>Borradores</h3>
          </div>
        </nav>
        <?php
            require '../php/config/database.php';
            $redireccion=1;
            $numPosts = "SELECT * FROM post WHERE status=0 ORDER BY created_at ASC";
            $consulta= $conn->query($numPosts);
            $idPost = ($consulta->fetchAll(PDO::FETCH_ASSOC));
            ?>
            <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
              <form method="post" action="./formDraft.php">
              <input type="hidden" name="txtid" id="txtid" value="<?php echo $idPost['id']; ?>" />
                <input type="submit" name="submit" class="btn btn-sm btn-success " value="Agregar un nuevo borrador">
              </form>
            </div>
            <?php foreach ($idPost as $lisPost) { ?>
        <div class="card">
          <div class="card-header">
          <?php echo $lisPost['created_at']; ?>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $lisPost["title"]; ?></h5>
            <p class="card-text"><?php echo $lisPost["description"]; ?></p>
            <div class="input-group mb-3">
            <form method="post" action="./statusPost.php">
              <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
              <input type="submit" class="form-control btn btn-success" name="accion" value="Publicar" />
            </form>
            <form method="post" action="./formEditar.php">
              <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
              <input type="submit" class="form-control btn btn-warning" name="accion" value="Editar" />
            </form>
            <form method="post" action="articulo.php"> 
              <input type="hidden" name="id" id="id" value="<?php echo $lisPost['id']; ?>" />
              <input type="submit"  class="form-control btn btn-primary" name="accion" value="Vista previa"/>
            </form>
            <form method="post" action="./deletePost.php">
              <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
              <input type="hidden" name="redireccion" id="redireccion" value="<?php echo $redireccion; ?>" />
              <input type="submit"  class="form-control btn btn-danger" name="accion" value="Eliminar borrador"/>
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

  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>