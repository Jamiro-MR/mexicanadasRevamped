<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/indSeccStyle.css" rel="stylesheet">
    <link href="../assets/favicon.ico" rel="icon">
</head>

<!-- ---------------------------------------------------
                    BARRA DE NAVEGACIÓN
----------------------------------------------------- -->
<header>
  <!-- Fixed navbar -->
	<nav class="navbar navbar-expand-md navbar-light fixed-top navbar-custom som">
    <div class="container-fluid" id="menu">
    </div>
  </nav>
</header>
<br><br><br><br>
<!-- ---------------------------------------------------
                    CONTENIDO
----------------------------------------------------- -->
<body >

<div class="container-sm">
    <div class="row justify-content-md-center">

        <div class="col-auto col-md-5"> <!-- Primera columna-->
            <div class="card mb-3 text-dark bg-light mb-3 border border-secondary p-3 mb-">
              <div class="row g-0">
                <div class="col-md-3 justify-content-md-center">
                  <img src="../assets/coding.png" style="width: 100px" class="" alt="...">
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <h5 class="card-title">Chipres Arteaga Juan Pablo</h5>
                    <p class="card-text"><small class="text-muted">Programador</small></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3 text-dark bg-light mb-3 border border-secondary p-3 mb-">
              <div class="row g-0">
                <div class="col-md-3">
                  <img src="../assets/coding.png" style="width: 100px" class="" alt="...">
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <h5 class="card-title">Flores Alcalá Anayansi Valeria</h5>
                    <p class="card-text"><small class="text-muted">Programadora</small></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3 text-dark bg-light mb-3 border border-secondary p-3 mb-">
              <div class="row g-0">
                <div class="col-md-3">
                  <img src="../assets/developer.png" style="width: 100px" class="" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Gutiérrez Bejarano Braulio Roberto</h5>
                    <p class="card-text"><small class="text-muted">Diseñador</small></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3 text-dark bg-light mb-3 border border-secondary p-3 mb-">
              <div class="row g-0">
                <div class="col-md-3">
                  <img src="../assets/internet.png" style="width: 100px" class="" alt="...">
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <h5 class="card-title">Preciado Ayala Jairo</h5>
                    <p class="card-text"><small class="text-muted">Documentador</small></p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-auto col-md-1"> <!-- segundacolumna-->
        </div>
        <div class="col-sm-12 col-md-6">  <!-- tercera columna --> 
          <div class=""> <!-- Aqui se pone el articulo principal -->
            <div class="p-2 p-md-3 mb-2 text-white rounded bg-">
                <!--<img class="img-fluid d-block mx-auto" style="width: 30pc" src="../assets/contacto1.gif"> -->
                <p class="textcoloraized">C O N T A C T O</p>
            </div>
            <div class="colore-carta card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
              <form method="post" action="./enviarContacto.php">
                <label for="" class="form-label">Nombre</label>
                <input class="form-control" name="name" type="text" required>
                <br>
                <label type="email"for="" class="form-label">Correo electronico</label>
                <input class="form-control" name="email" type="text" required>
                <br>
                <label for="" class="form-label">Contenido</label>
                <textarea class="story-editor medium-editor-element medium-editor-placeholder form-control" id="exampleFormControlTextarea1" name="content" rows="6"></textarea>
                <br>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../js/menu.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>