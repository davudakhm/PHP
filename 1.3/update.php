<?php 

//require 'config.php';

session_start();

$id =  $_GET['id'];
$task = $_POST['su'];

require "config.php";
$request = "UPDATE `tasks` SET `task` = ? WHERE `id` = ?";
$result = $pdo->prepare($request);
$result->execute([$id, $task]);
header("Location: todo.php");

//if(isset($_POST["sub"])){
//    $login = $_POST["uname"];
//    $password = $_POST["password"];
//   // $cpassword = $_POST["cpswrd"];
//    $request = "INSERT INTO users(login, password) VALUES (?,?)"; 
//    //Отправляем данные в базу данных (21.02.2023)
//    $result = $pdo->prepare($request);
//    $result->execute([$login, $password]);
//    if($result) echo "Success";
//    else echo "ERROR";
//}

//$request2 = "UPDATE `tasks` SET `task`='[value-2]' WHERE `id` = ?"
 ?>