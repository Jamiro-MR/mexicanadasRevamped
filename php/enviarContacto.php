<?php
require '../php/config/database.php';
$records = $conn->prepare("INSERT INTO contact(name, email, content)VALUES(:name, :email, :content)");
$records->bindParam(':name', $_POST['name']);
$records->bindParam(':email', $_POST['email']);
$records->bindParam(':content', $_POST['content']);
$records->execute();
header('refresh:2;contacto.php');
?>