<?php require "../php/config/validarSesion.php"; 
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}?>
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
                      <h3>Administrador de noticias</h3>
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
                <iframe src="index.php" width="900" height="400"></iframe>
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