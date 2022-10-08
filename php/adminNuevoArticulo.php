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
            <h3>Nueva noticia</h3>
          </div>
        </nav>
        <div class="container-sm">
          <div class="row">
          <form method="post" action="../php/upload.php" enctype="multipart/form-data">
            <div class="grid">  <!-- Columna -->             
            <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                <label class="visually-hidden" for="autoSizingInputGroup">Autor</label>

                <div class="input-group-append" >
                    <span class="input-group-text"><i class="bi bi-person-circle"><?php echo $user["autor"];?></i></span>

                  </div>

              </div>  

              <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                <label for="" class="form-label">Titulo del articulo</label>
                <input type="text" class="form-control" name='title' id="title" required>
                <div class="valid-feedback">Looks good!</div>
                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                <textarea class="story-editor medium-editor-element medium-editor-placeholder form-control" name="description"></textarea>
                <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
                <textarea class="story-editor medium-editor-element medium-editor-placeholder form-control" id="exampleFormControlTextarea1" name="content" rows="6"></textarea>
                <!--<div class="story-editor medium-editor-element medium-editor-placeholder form-control" role="textarea" aria-label="Escribe tu historia" aria-multiline="true" contenteditable="true" spellcheck="true" data-medium-editor-element="true" data-medium-editor-editor-index="1" medium-editor-index="ac44f950-0d98-6673-8139-ede0ad718cbb" data-placeholder="Type your text"><p name="description" data-p-id="d41d8cd98f00b204e9800998ecf8427e"><br></p><p><br></p>
                </div>-->
                <br>

              <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                <label for="categoryselect">Categoría</label>
                <select name="category_id"id="categoryselecy" class="form-control">
                  <option value="-1">Selecciona una categoría</option>
                  <option value="1">Política</option>
                  <option value="2">Tecnología</option>
                  <option value="3">Deportes</option>
                  <option value="4">Cultura</option>
                </select>
                <br>
                <div>
                  <div class="card text-dark bg-light mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Fuentes consultadas</label>
                    <input type="text" class="form-control" name='link1' id="links" required>
                    <input type="text" class="form-control" name='link2' id="links" required>
                    <input type="text" class="form-control" name='link3' id="links" required>
                  </div>
                  <div class="card text-dark bg-light mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto" accept="image/*">
                  </div>
                </div>
              </div>

              </div>
              <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                      <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Publicar">
            </form>
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