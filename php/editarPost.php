<?php
require '../php/config/database.php';
$post_img = $_FILES['foto']['name'];
$imgTmp = $_FILES['foto']['tmp_name'];
$txtid=$_POST['txtid'];
$upload_dir = '../uploads';
$longitud = 10;
$newName= substr( md5(microtime()), 1, $longitud);
$explode = explode('.', $post_img);
$ext = array_pop($explode);
$photo = $newName.'.'.$ext;
$ruta=$upload_dir.'/'.$photo;
$sentencia_editar = $conn->prepare("UPDATE post SET title='".$_POST['title']."', content='".$_POST['description']."', image='".$ruta."', category_id='".$_POST['category_id']."', link1='".$_POST['link1']."', link2='".$_POST['link2']."', link3='".$_POST['link3']."' WHERE id='".$txtid."'");
$sentencia_editar -> BindParam(':id', $txtid);
$sentencia_editar -> execute();
if($sentencia_editar){
    move_uploaded_file($imgTmp,$upload_dir.'/'.$photo);
    header('refresh:2;adminTodos.php');

}else{
    header('refresh:2;adminTodos.php');
}

?>