<?php 
session_start();
if(isset($_POST['sel'])){
    if (isset($_POST['su'])){
    require "config.php";
    $task = $_POST['update'];
    $id =  $_GET['id'];
    $request = "UPDATE `tasks` SET `task` = ? WHERE `id` = ?";
    $query = $pdo->prepare($request);
    $query->execute([$task, $id]);
    header("Location: todo.php"); 
    }
}

 ?>