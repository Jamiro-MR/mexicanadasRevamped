<?php
require "../php/config/validarSesion.php"; 
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}

require '../php/config/database.php';

if (isset($_SESSION['user_id'])){
  $records = $conn->prepare('SELECT id, email, autor, password FROM admins WHERE id =:id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user=null;

  if(is_countable($results) > 0){
    $user = $results;
  }
}
$upload_dir = '../uploads';

if(isset($_POST['submit'])){
    $post_img = $_FILES['foto']['name'];
    $imgTmp = $_FILES['foto']['tmp_name'];
    $imgSize = $_FILES['foto']['size'];
    $longitud = 10;
    $newName= substr( md5(microtime()), 1, $longitud);
    $explode = explode('.', $post_img);
    $ext = array_pop($explode);
    $photo = $newName.'.'.$ext;
    $autor_post = $user['id'];
    $title_post = $_POST['title'];
    $description_post = $_POST['description'];
    $content_post = $_POST['content'];
    $url1 = $_POST['link1'];
    $url2 = $_POST['link2'];
    $url3 = $_POST['link3'];
    $category_post = $_POST['category_id'];
    $ruta=$upload_dir.'/'.$photo;
    $status=0;

    if(empty($title_post)){
        $errorMsg = 'Please input post title';
    }elseif(empty($autor_post)){
        $errorMsg = 'Please input post autor';
    }elseif(empty($description_post)){
        $errorMsg = 'Please input post description';
    }elseif(empty($content_post)){
        $errorMsg = 'Please input post content';
    }elseif(empty($category_post)){
        $errorMsg = 'Please input notice category';
    }else{
        $imgExt = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
        $allowExt = array('jpeg', 'jpg', 'png', 'gif', 'jfif');
        if(in_array($imgExt, $allowExt)){
            if($imgSize < 5000000){
                move_uploaded_file($imgTmp,$upload_dir.'/'.$photo);
            }else{
                echo $errorMsg = 'Image too large';

            }
        }else{
            echo $errorMsg = 'Please select a valid image';
        }
    }

    if(!isset($errorMsg)){
        $sql = $conn->prepare("INSERT INTO post (title, autorid, description, content, image, category_id, link1, link2, link3, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->execute(array($title_post, $autor_post, $description_post, $content_post, $ruta, $category_post, $url1, $url2, $url3, $status));
        if($sql){
            echo "Agregado con exito.";
            header('refresh:2;adminTodos.php');
        }else{
            echo $errorMsg = 'Error en la consulta';
        }
    }
}

?> 