<?php
include_once "funciones.php";
$id = $_POST["id"];
$name = $_POST['name']; // Get Name from form
$email = $_POST['email']; // Get Email from form
$comment = $_POST['comment']; // Get Comment from form
$comentario_enviado = comentar($name, $email, $comment, $id);
if ($comentario_enviado) {
    echo "Comentario enviado para su revision.";
    header('refresh:2;articulo.php?id='.$id.'');
} else {
    echo "Ha habido un error al enviar el comentario.";
    header('refresh:2;articulo.php?id='.$id.'');
}
