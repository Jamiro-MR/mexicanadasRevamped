<?php
require "../php/config/validarSesion.php"; 
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}
require '../php/config/database.php';
$txtid=$_POST['txtid'];
$numPosts = "SELECT * FROM post WHERE post.id='".$txtid."'";
$consulta= $conn->query($numPosts);
$sentencia_mostrar= $consulta->fetch(\PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mexicanadas</title>
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
      <nav class="scroller"> <!-- Menu --> <div id="menu"></div></nav>
    </div>

    <!-- Page Content  -->
    <div class="site-heading">
       <div class="margin"> <!-- Margin 5px y padding 5px -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary">
          <div class="container-fluid">
            <h3>Editor de noticias</h3>
          </div>
        </nav>
        <div class="container-sm">
          <div class="row">
          <form method="post" action="../php/editarPost.php" enctype="multipart/form-data">
          <input type="hidden" name="txtid" id="txtid" value="<?php echo $txtid?>" />
            <div class="grid">  <!-- Columna -->             
              <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                <label class="visually-hidden" for="autoSizingInputGroup">Autor</label>

                <div class="input-group-append" >
                    <span class="input-group-text"><i class="bi bi-person-circle"><?php echo $user["autor"];?></i></span>
                  </div>

              </div>  

              <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                <label for="" class="form-label">Titulo del articulo</label>
                <input type="text" class="form-control" name='title' id="title" value="<?php echo $sentencia_mostrar["title"];?>" required>
                <div class="valid-feedback">Looks good!</div>
                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                <textarea class="story-editor medium-editor-element medium-editor-placeholder form-control" name="description" ><?php echo $sentencia_mostrar["description"];?></textarea>
                <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
                <textarea class="story-editor medium-editor-element medium-editor-placeholder form-control" id="exampleFormControlTextarea1" name="content" rows="6"><?php echo $sentencia_mostrar["content"];?></textarea>
                <br>

              <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                <label for="categoryselect">Categoría</label>
                <select name="category_id"id="categoryselecy" class="form-control" value="<?php echo $sentencia_mostrar["category_id"];?>">
                  <option value="-1">Selecciona una categoría</option>
                  <option value="1">Política</option>
                  <option value="2">Tecnologia</option>
                  <option value="3">Deportes</option>
                  <option value="4">Cultural</option>
                </select>
                <br>
                <div>
                <div class="card text-dark bg-light mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Fuentes consultadas</label>
                    <input type="text" class="form-control" name='link1' id="links" value="<?php echo $sentencia_mostrar["link1"];?>" required>
                    <input type="text" class="form-control" name='link2' id="links" value="<?php echo $sentencia_mostrar["link2"];?>" required>
                    <input type="text" class="form-control" name='link3' id="links" value="<?php echo $sentencia_mostrar["link3"];?>" required>
                  </div>
                  <label for="" class="form-label">Foto</label>                  
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" name="foto" id="foto">
                  </div>
                </div>
              </div>
              
                
              </div>
              <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">

                      <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Publicar">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">  <!-- Columna --> 
              <div class="mb-3"></div>
            </div>
            </form>
          </div>  
        </div>          
      </div>
    </div>
  </div>
</body>
  <script type="text/javascript" src="../js/adminmenu.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
</html>
