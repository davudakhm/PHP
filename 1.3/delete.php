<?php 

require 'config.php';

$id = $_GET['id'];

  $sql = 'DELETE FROM `list` WHERE `id` = ?';
  $query = $pdo->prepare($sql);
  $query->execute([$id]);

  header('Location: todo.php');

 ?>