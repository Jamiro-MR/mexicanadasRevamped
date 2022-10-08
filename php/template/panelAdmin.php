
<div class="wrapper">
          <!-- Sidebar  -->
          <nav id="sidebar">
              <div class="sidebar-header text-center">
              <?php $userV = $user["id_privileges"]?>
                  <h6>Bienvenido <?= $user['email']?></h6>
              </div>

                <?php if($userV == 1):?>
                    <ul class="list-unstyled components">
                        <li>
                            <a href="../php/adminRegistro.php">Administrar usuarios</a>
                        </li>
                        <li>
                            <a href="../php/adminTodos.php">Publicaciones</a>
                        </li>
                        <li>
                            <a href="../php/adminComentarios.php">Comentarios</a>
                        </li>
                        <li>
                            <a href="../php/adminBorradores.php">Borradores</a>
                        </li>
                        <li>
                            <a href="../php/adminEstadistica.php">Estadisticas</a>
                        </li>
                        <li>
                            <a href="../php/adminContacto.php">Mensajes</a>
                        </li>
                        <li>
                            <a href="../php/logout.php">Cerrar sesion</a>
                        </li>
                    </ul>
                    <ul class="list-unstyled CTAs">
                        <li>
                            <a href="../php/adminNuevoArticulo.php" class="article">+</a>
                        </li>
                    </ul>
                    <?php else: ?>
                     <ul class="list-unstyled components">
                        <li>
                            <a href="../php/adminTodos.php">Publicaciones</a>
                        </li>
                        <li>
                            <a href="../php/adminComentarios.php">Comentarios</a>
                        </li>
                        <li>
                            <a href="../php/adminBorradores.php">Borradores</a>
                        </li>
                        <li>
                            <a href="../php/adminEstadistica.php">Estadisticas</a>
                        </li>
                        <li>
                            <a href="../php/adminContacto.php">Mensajes</a>
                        </li>
                        <li>
                            <a href="../php/logout.php">Cerrar sesion</a>
                        </li>
                    </ul>

                <ul class="list-unstyled CTAs">
                  <li>
                      <a href="../php/adminNuevoArticulo.php" class="article">+</a>
                  </li>
              </ul>
              <?php endif; ?>
      </div>
