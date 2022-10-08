<?php require "../php/config/validarSesion.php"?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mexicanadas</title>
  <!-- <link rel="stylesheet" href="../css/grid.css"> -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/adminMenu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
  <link href="../assets/favicon.ico" rel="icon">
  </head>
  <body>
    <?php if(!empty($user)): ?>
      <section>
        <?php include("../php/template/panelAdmin.php"); ?>
      <!-- Page Content  -->
      <article>
          <div id="content">

              <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary">
                  <div class="container-fluid">
                      <h3>Administrador de noticia</h3>
                  </div>
              </nav>
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <form action="adminTodos.php">
                      <button class="nav-link active" type="submit">Home</button>
                    </form>
                  </li>
                  <li class="nav-item" role="presentation">
                    <form action="adminVista.php">
                      <button class="nav-link"  type="submit"><i class="bi bi-eye-fill"></i></button>
                    </form>
                  </li>
                </ul>
            <?php
            require '../php/config/database.php';
            $redireccion=0;
            $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
            $userV = $user["id"]; 
            $numPosts = "SELECT pst.id as codigo, autor, title, description, content, image, created_at FROM post as pst INNER JOIN admins as adm on pst.autorid = adm.id WHERE status=1";
            $consulta= $conn->query($numPosts);
            $idPost = ($consulta->fetchAll(PDO::FETCH_ASSOC));
            ?>
              <table class="table table-hover table-success table-striped table-fixed" id="tabla">
                <thead>
                  <tr>
                    <th class="align-middle text-center">ID</th>
                    <th class="align-middle text-center">Autor</th>
                    <th class="align-middle text-center">Titulo</th>
                    <th class="align-middle text-center">Descripcion</th>
                    <th class="align-middle text-center">Contenido</th>
                    <th class="align-middle text-center">Imagen</th>
                    <th class="align-middle text-center">Fecha de creacion</th>
                    <th class="align-middle text-center">Editar/Borrar</th>
                    <th class="align-middle text-center">Ver</th>
                  </tr>
                </thead>
              <tbody>
                <?php foreach ($idPost as $lisPost) { ?>
                <tr>
                  <td class="align-middle"><?php echo $lisPost['codigo']?></td>
                  <td class="align-middle "><?php echo $lisPost['autor']?></td>
                  <td class="align-middle "><?php echo $lisPost['title']?></td>
                  <td class="align-middle "><?php echo substr($lisPost['description'],0,40)?>.......</td>
                  <td class="align-middle "><?php echo substr($lisPost['content'],0,40)?>.......</td>
                  <td class="align-middle "><img src="<?php echo substr($lisPost['image'],0) ?>" width="120" alt="" srcset=""></td>
                  <td class="align-middle "><?php echo $lisPost['created_at']?></td>

                  <td class= "align-middle">

                  <form method="post" action="./deletePost.php">
                    <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['codigo']; ?>" />
                    <input type="hidden" name="redireccion" id="redireccion" value="<?php echo $redireccion; ?>" />
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger mt-3"/>

                  </form>
                    <!--</td> class="align-middle "><button type="submit" id="eliminar"
                    class="btn btn-danger mt-3"><i class="bi bi-trash"></i></button> 
                    <td class="align-middle "><button type="submit" name="accion"
                    class="btn btn-warning mt-3"><i class="bi bi-pencil-square"></i></button> -->
                  <form method="post" action="./formEditar.php">
                  <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['codigo']; ?>" />
                    <input type="submit" name="accion" value="Editar" class="btn btn-warning mt-3"/>
                  </form>
                    </td>


                  <td class="align-middle ">
                    <a href="articulo.php?id=<?= $lisPost["codigo"]?>" class="btn btn-success mt-3"><i class="bi bi-eye-fill"></i></a>
                  </td>


                </tr>
                <?php }?>
              </tbody>
            </table>
            </div>
            </div>
      </article>
      </section>

    <?php else:
    header('Location: ../php/login.php'); 
    ?>
    <?php endif; ?>

   <script type="text/javascript" src="../js/datatable.js"></script>
   <sript src="../js/datatable.js"></sript>
   </body>
</html>