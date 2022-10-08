<?php
require './php/config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mexicanadas: Inicio</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link href="./assets/favicon.ico" rel="icon">
	<link href="./css/indSeccStyle.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap" rel="stylesheet">
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
  <br><br>
		<!-- carrusel -->
    <?php
    //Consulta para primer post del carrusel
            $sqlConsulta = "SELECT id, title, description, image, created_at FROM post ORDER BY created_at";
            $consulta= $conn->query($sqlConsulta);
            $idNot= $consulta->fetch(\PDO::FETCH_ASSOC);

            $sqlCarrusel = "SELECT id, title, description, image, created_at FROM post ORDER BY created_at ASC limit 1,2";
            $consultaCrr = $conn->query($sqlCarrusel);
            $idCrr = $consultaCrr->fetchAll(\PDO::FETCH_ASSOC);
            ?>

    <div class="container-lg mb-5 som">
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade bg-success" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo substr($idNot['image'],0) ?>" class="d-md-block w-100" alt="...">
              <div class="carousel-caption d-md-block d-sm-block p-2">
                <h5 class="fs-1"><?php echo $idNot["title"]?></h5>
                <p><?php echo $idNot["description"]?></p>
                <div class="slider-btn">
                  <a href="./php/articulo.php?id=<?= $idNot["id"]?>" class="btn btn-1">Ir a la noticia</a>
                </div>
              </div>
            </div>
            <?php foreach ($idCrr as $carousel){?>
            <div class="carousel-item">
              <img src="<?php echo substr($carousel['image'],0) ?>" class="d-block w-100" alt="...">
              <div class="carousel-caption  d-md-block d-sm-block p-2">
                <h6><?php echo $carousel["title"]?></h5>
                <p><?php echo $carousel["description"]?></p>
                <div class="slider-btn">
                  <a href="./php/articulo.php?id=<?= $carousel["id"]?>" class="btn btn-1">Ir a la noticia</a>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
        <!-- Category News Start-->
            <?php
            $catpol = "SELECT id, title, description, image, category_id FROM post WHERE category_id=1";
            $consulta= $conn->query($catpol);
            $idPol= $consulta->fetchAll(\PDO::FETCH_ASSOC);
            ?>
        <div class="cat-news">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Politica</h2>
                        <?php foreach ($idPol as $PolId) { ?>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo substr($PolId['image'],0) ?>" />
                                    <div class="cn-title">
                                        <a href="./php/articulo.php?id=<?= $PolId["id"]?>"><?php echo $PolId["title"]?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                    <?php
            $catTec = "SELECT id, title, description, image, category_id FROM post WHERE category_id=2";
            $consulta= $conn->query($catTec);
            $idTec= $consulta->fetchAll(\PDO::FETCH_ASSOC);
            ?>
                    <div class="col-md-6">
                        <h2>Tecnología</h2>
                        <?php foreach ($idTec as $tecId) { ?>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo substr($tecId['image'],0) ?>" />
                                    <div class="cn-title">
                                      <a href="./php/articulo.php?id=<?= $tecId["id"]?>"><?php echo $tecId["title"]?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
        <!-- Category News End-->

        <!-- Category News Start-->
        <?php
            $catDep = "SELECT id, title, description, image, category_id FROM post WHERE category_id=3";
            $consulta= $conn->query($catDep);
            $idDep= $consulta->fetchAll(\PDO::FETCH_ASSOC);
            ?>
        <div class="cat-news">
            <div class="container">
                <div class="row">
                <div class="col-md-6">
                        <h2>Deporte</h2>
                        <?php foreach ($idDep as $DepId) { ?>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo substr($DepId['image'],0) ?>" />
                                    <div class="cn-title">
                                      <a href="./php/articulo.php?id=<?= $DepId["id"]?>"><?php echo $DepId["title"]?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                    <?php
            $catCult = "SELECT id, title, description, image, category_id FROM post WHERE category_id=4";
            $consulta= $conn->query($catCult);
            $idCult= $consulta->fetchAll(\PDO::FETCH_ASSOC);
            ?>
                    <div class="col-md-6">
                        <h2>Cultura</h2>
                        <?php foreach ($idCult as $CultId) { ?>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo substr($CultId['image'],0) ?>" />
                                    <div class="cn-title">
                                      <a href="./php/articulo.php?id=<?= $CultId["id"]?>"><?php echo $CultId["title"]?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->
  
        <!-- Main News End-->
<script type="text/javascript" src="./js/menuIndex.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>