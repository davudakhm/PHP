<?php 

//require 'config.php';

session_start();

$id =  $_GET['id'];

require "config.php";
$request = "DELETE FROM `tasks` WHERE `id` =?";
$result = $pdo->prepare($request);
$result->execute([$id]);
header("Location: todo.php");

//$id = $_GET['id'];
//
//  $sql = 'DELETE FROM `task` WHERE `id` = ?';
//  $query = $pdo->prepare($sql);
//  $query->execute([$id]);
//
//  header('Location: todo.php');

 ?>
