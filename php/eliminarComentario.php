<?php
include_once "funciones.php";
$id = $_POST["id"];
$eliminado = eliminarComentario($id);
if ($eliminado) {
    echo "Comentario eliminado.";
    header('refresh:2;adminComentarios.php');
} else {
    echo "Ha habido un error al eliminar el comentario.";
    header('refresh:2;adminComentarios.php');
}
