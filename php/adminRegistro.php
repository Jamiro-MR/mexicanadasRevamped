<?php require "../php/config/validarSesion.php"; 
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}?>
<?php
if (isset($_POST['delete'])) { 
  $txtid=$_POST['txtid'];
  $sentencia_borrar = $conn->prepare("DELETE FROM admins WHERE id='".$txtid."'");
  $sentencia_borrar -> BindParam(':id', $txtid);
  $sentencia_borrar -> execute();  
	if ($sentencia_borrar) {
		echo "<script>alert('Usuario eliminado.')</script>";
	} else {
		echo "<script>alert('Ha habido un error.')</script>";
	}
}
?>
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

      <?php include("../php/template/panelAdmin.php");?>


      <!-- Page Content  -->
      <article>
      <div id="content">

<nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary">

    <div class="container-fluid">
        <h3>Administrador de usuarios</h3>
    </div>
</nav>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <form action="addUser.php">
                      <button class="btn btn-success mt-3" type="submit">Registrar nuevo usuario</button>
                    </form>
                  </li>
                </ul>

<?php
require '../php/config/database.php';
$redireccion=0;
$txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
$userV = $user["id"]; 
$admins = "SELECT id, autor, id_privileges, email FROM admins";
$consulta= $conn->query($admins);
$idAdmin = ($consulta->fetchAll(PDO::FETCH_ASSOC));
?>
<table class="table table-hover table-success table-striped table-fixed" id="tabla">
  <thead>
    <tr>
      <th class="align-middle text-center">ID</th>
      <th class="align-middle text-center">Usuario</th>
      <th class="align-middle text-center">Privilegio</th>
      <th class="align-middle text-center">Email</th>
      <th class="align-middle text-center">Editar/Borrar</th>
    </tr>
  </thead>
<tbody>
  <?php foreach ($idAdmin as $admin) { ?>
  <tr>
    <td class="align-middle"><?php echo $admin['id']?></td>
    <td class="align-middle "><?php echo $admin['autor']?></td>
    <td class="align-middle "><?php echo $admin['id_privileges']?></td>
    <td class="align-middle "><?php echo $admin['email']?></td>

    <td class= "align-middle">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form">
      <input type="hidden" name="txtid" id="txtid" value="<?php echo $admin['id']; ?>" />
      <input type="submit" name="delete" value="Borrar" class="btn btn-danger mt-3"/>
    </form>
      <!--</td> class="align-middle "><button type="submit" id="eliminar"
      class="btn btn-danger mt-3"><i class="bi bi-trash"></i></button> 
      <td class="align-middle "><button type="submit" name="accion"
      class="btn btn-warning mt-3"><i class="bi bi-pencil-square"></i></button> -->
    <form method="post" action="./formEditarUser.php">
      <input type="hidden" name="txtid" id="txtid" value="<?php echo $admin['id']; ?>" />
      <input type="submit" name="accion" value="Editar" class="btn btn-warning mt-3"/>
    </form>
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