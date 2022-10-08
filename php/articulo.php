<?php

/**Get id and information about of the post */
require '../php/config/database.php';
include_once "funciones.php";
$id = $_GET["id"];
$numPosts = "SELECT pst.id as codigo, autor, title, description, content, image, created_at FROM post as pst INNER JOIN admins as adm on pst.autorid = adm.id WHERE pst.id='".$id."'";
$consulta= $conn->query($numPosts);
$sentencia_mostrar= $consulta->fetch(\PDO::FETCH_ASSOC);
/**Get new posts */
$obNew = "SELECT id, title, description FROM post WHERE status=1  ORDER BY id ASC limit 0,3";
$consultaNew = $conn->query($obNew);
$newsnow = $consultaNew->fetchAll(\PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Articulo: Mexicanadas</title>
  <!-- <link rel="stylesheet" href="../css/grid.css"> -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/articulo.css">
  <link href="../assets/favicon.ico" rel="icon">
</head>

<!-- ---------------------------------------------------
                    BARRA DE NAVEGACIÓN
----------------------------------------------------- -->
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container-fluid" id="menu">
    </div>
  </nav>
</header>

<body>
  <br><br><br><br>
<!-- ---------------------------------------------------
                    CONTENIDO
----------------------------------------------------- -->
  <div class="container-xl">
    <div class="row">
        <div class="p-2 p-md-3 mb-2 text-white rounded bg-">
            <img class="img-fluid" src="../assets/articuloblog.png" alt="">
        </div>
      
    </div>
  </div>

  <div class="container-sm">
      <div class="row">
        <div class="col-auto col-md-3">  <!-- Primera columna -->
          
          <nav class="navbar navbar-light bg-light shadow-sm p-3 mb-3 bg-body rounded text"> <!-- Aqui se pone el buscador -->
            <div class="card-title">

            </div>
          </nav>
          <!-- <div class="col-sm-12 col-md-3">   Aqui van las noticias de lado izquierdo -->
           <?php foreach ($newsnow as $new){?> 
            <div class="card border border-secondary">
              <div class="colore-carta3 card-body">
                <h5 class="card-title"><?php echo $new["title"]?></h5>
                <p class="card-text"><?php echo $new["description"]?></p>
                <a href="articulo.php?id=<?= $new["id"]?>" class="btn btn-danger">Ir a la noticia</a>
              </div>
            </div>
            <?php }?>
            <br>
            <div class="row justify-content-md-center">
            <div class="card shadow-sm p-3 mb-5 bg-body rounded border border-secondary" style="width: 18rem;">
              <div class="card-header text-center">
                Fuentes consultadas
              </div>
              <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"><a href="<?php echo $sentencia_mostrar["link1"]?>" class="card-link">Consultar fuente</a></li>
                <li class="list-group-item"><a href="<?php echo $sentencia_mostrar["link2"]?>" class="card-link">Consultar fuente</a></li>
                <li class="list-group-item"><a href="<?php echo $sentencia_mostrar["link3"]?>" class="card-link">Consultar fuente</a></li>
              </ul>
            </div>
            </div>
          <!-- </div> -->
        </div>

        <div class="col-sm-12 col-md-6">  <!-- Segunda columna --> 
          <div class="card text-dark bg-light mb-3 border border-secondary" style=""> <!-- Aqui se pone el articulo principal -->
            <div class="colore-carta card-body">
            <img src="<?php echo substr($sentencia_mostrar['image'],0) ?>" class="imgs">
              <h5 class="card-title fs-9 text-uppercase"><?php echo $sentencia_mostrar["title"]?></h5>
              <div class="card-title">Autor:
                        <?php echo $sentencia_mostrar["autor"]?>
                      </div>
              <p class="card-text"><small class="text-muted"><?php echo $sentencia_mostrar["created_at"]?></small></p>
              <p class="colore-carta2 card-text shadow p-3 mb-5 bg-body rounded text-justify"><?php echo $sentencia_mostrar["content"]?></p>
              <div class="wrapper">
                <form action="comentar.php" method="POST" class="form">
                  <div class="row">
                    <div class="input-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" placeholder="Enter your Name" required>     
                    </div>
                    <div class="input-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" placeholder="Enter your Email" required>
                    </div>
                  </div>
                  <div class="input-group textarea">
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
                  </div>
                  <div class="input-group">
                    <button name="submit" class="btn">Enviar comentario</button>
                  </div>
                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                </form>
                <div class="prev-comments">
                  <?php 
                  $res =('SELECT * FROM comment WHERE post_id='.$id.' AND status=2');
                  $consulta= $conn->query($res);
                  $com = $consulta->fetchAll(\PDO::FETCH_ASSOC);
                  ?>
                  <?php
                  foreach($com as $row){ ?>
                      <div class="single-item">
                        <h4><?php echo $row['name']; ?></h4>
                        <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                        <p><?php echo $row['comment']; ?></p>
                      </div>
                      <?php
                      }
                    ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="col-auto col-md-3"> <!-- Tercera columna -->
          <div class="colore-carta3 card border border-secondary"> <!-- Aqui se pone la tarjeta de autor -->
          <img src="../assets/nosotros.png" class="card-img-top border border-5" alt="...">
          <div class="card-body">
            <h5 class="card-title">Autores</h5>
            <p class="card-text"><small class="text-muted">Nosotros</small></p>
            <p class="card-text">Encargados de informarte dia con dia.</p>
            <a href="../php/creadores.php" class="btn btn-primary">Más</a>
          </div>
        </div>
        <br>
        <div class="card border-secondary">
          <div class="colore-carta3 card-body">
            <h5 class="card-title">¡Contactanos!</h5>
            <p class="card-text">Ponte en contacto con los creadores de la página.</p>
            <a href="contacto.php" class="btn btn-primary">Contactar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src="../js/menu.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

 </body>
</html>
