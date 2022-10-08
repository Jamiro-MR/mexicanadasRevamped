<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])){
  $records = $conn->prepare('SELECT id, autor, id_privileges, email, password FROM admins WHERE id =:id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user=null;

  if(is_countable($results) > 0){
    $user = $results;
  }
}
?>