<?php
require '../php/config/database.php';
$id=$_POST['txtid'];
$aprobar = $conn->prepare("UPDATE comment SET status=2 WHERE id='".$id."'");
$aprobar -> execute();
if ($aprobar) {
    header('refresh:2;adminComentarios.php');
} else {
    echo "ha habido un error";
    echo $aprobar;
}
?>