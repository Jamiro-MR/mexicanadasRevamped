<?php
require '../php/config/database.php';
$txtid=$_POST['txtid'];
$sentencia_editar = $conn->prepare("UPDATE post SET status=1 WHERE id='".$txtid."'");
$sentencia_editar -> BindParam(':id', $txtid);
$sentencia_editar -> execute();
if($sentencia_editar){
    header('refresh:2;adminTodos.php');
}else{
    header('refresh:2;adminTodos.php');
    $errorMsg = 'Error al modificar post';
}
?>