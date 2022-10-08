<?php
require '../php/config/database.php';
$redireccionChoose=$_POST['redireccion'];
$txtid=$_POST['txtid'];
$numPosts = "SELECT image FROM post  WHERE id='".$txtid."'";
$consulta= $conn->query($numPosts);
$sentencia_mostrar= $consulta->fetch(\PDO::FETCH_ASSOC);
$imgs=substr($sentencia_mostrar['image'],0); //extrae la ruta
unlink($imgs); //borra la imagen de la carpeta uploads
$sentencia_borrar = $conn->prepare("DELETE a1, a2 FROM post AS a1 INNER JOIN comment AS a2 WHERE a1.id=a2.post_id AND a1.id ='".$txtid."'");
$sentencia_borrar -> BindParam(':id', $txtid);
$sentencia_borrar -> execute();

if($redireccion==0){
    header('Location: ../php/adminTodos.php');
}else{
    header('Location: ../php/adminBorradores.php');

}
?>