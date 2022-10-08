<?php
require '../php/config/database.php';
/**Noticia de la categoria */
$numPosts = "SELECT id, title, description, image, created_at FROM post WHERE category_id=4 AND status=1 ORDER BY id ASC limit 0,6 ";
$consulta= $conn->query($numPosts);
$idPost= $consulta->fetchAll(\PDO::FETCH_ASSOC);
/**Noticia principal */
$principalPost = "SELECT id, title, description, image, created_at FROM post WHERE category_id=4 AND status=1 ORDER BY id ASC limit 0,1 ";
$consultaPrin= $conn->query($principalPost);
$idPs= $consultaPrin->fetchAll(\PDO::FETCH_ASSOC);
/**Otras noticias */
$otrosPost = "SELECT id, title, description, image, created_at FROM post WHERE status=1  ORDER BY id ASC limit 0,2 ";
$consultaPosts= $conn->query($otrosPost);
$idOtros= $consultaPosts->fetchAll(\PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mexicanadas: Cultura</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="../assets/favicon.ico" rel="icon">
	<link href="../css/indSeccStyle.css" rel="stylesheet">
</head>

										<!-- navbar -->
<header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-custom som">
		<div class="container-fluid" id="menu">
		</div>
	</nav>
</header>
										<!-- inicio body -->
<body>
<br><br>
<br>
<div class="container-xl">
</div>

										<!-- latest new -->
<div class="container-xl grow">
                <div class="galeria-opc">
                  <?php foreach ($idPs as $post){ ?>
                    <div class="imagen-opc mt-2">
                      <a href="articulo.php?id=<?= $post["id"]?>">
                      <img src="<?php echo substr($post['image'],0) ?>" alt="">
                      <div class="hover-galeria">
                      </div>
                    </a>
                    </div>
                    <?php } ?>
                  </div>
            </div>

										<!-- noticias -->

									<!-- Titulo de la sección -->
<div class="row">
<div class="col-md-8">
<div class="titleBar mt-3 mx-3">
	<h2>Ultimas noticias</h2>
</div>
									<!-- Sección -->
<div class="row mb-2 px-4">
  <?php foreach ($idPost as $allPost) { ?>
            <div class="col-sm-12 col-md-4 mb-4 px-4 som">
              <center>
              <div class="card " style="width: 16rem;">
              <img src="<?php echo substr($allPost['image'],0) ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $allPost['title'] ?></h5>
                <p class="card-text"><?php echo $allPost['description'] ?></p>
                <a href="articulo.php?id=<?= $allPost["id"]?>" class="btn btn-danger ">Ir a la noticia</a>
              </div>
            </div>
              </center>
            </div>
            <?php } ?>
        </div>
</div>

<div class="col-md-4">
	<div class="titleBar mt-3 mx-3">
	<h2>Otras noticias</h2>
</div>
<?php foreach($idOtros as $otros){?>
  <div class="contenedor2 gap-3 grow2">
    <center>
    <div class="card" style="width: 18rem;">
    <img src="<?php echo substr($otros['image'],0) ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $otros['title'] ?></h5>
      <p class="card-text"><?php echo $otros['description'] ?></p>
      <a href="articulo.php?id=<?= $otros["id"]?>" class="btn btn-danger">Ir a la noticia</a>
    </div>
  </div>
    </center>
</div>
<?php }?>

<script type="text/javascript" src="../js/menu.js"></script>
<script type="text/javascript" src="../js/visitas.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
