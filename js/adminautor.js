let html = "";  

html +=`<div>
          <h3>Menú</h3>
        </div>
        <button class="buttons-nav" onclick="location.href='../php/adminTodos.php'">Publicaciones</button>
        <button class="buttons-nav" onclick="location.href='../php/adminComentarios.php'">Comentarios</button>
        <button class="buttons-nav" onclick="location.href='../php/adminBorradores.php'">Borradores</button>
        <button class="buttons-nav" onclick="location.href='../php/adminEstadistica.php'">Estadisticas</button>
        <button class="buttons-nav" onclick="location.href='../php/adminContacto.php'">Mensajes</button>
        <button class="buttons-nav" onclick="location.href='../php/logout.php'">Cerrar sesión</button>
        <ul class="list-unstyled CTAs">
          <li>
            <a href="../php/adminNuevoArticulo.php" class="article">+</a>
          </li>
        </ul>`;

const le = document.querySelector("#menuautor"); 
le.innerHTML = html;
