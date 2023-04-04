<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=" " method="post">
			<input name="update" type="text">
			<input name="su" type="submit">
	</form>
</body>
</html>

<?php 
session_start();
if (isset($_POST['su'])){
    require "config.php";
    $task = $_POST['update'];
    $id =  $_GET['id'];
    $request = "UPDATE `tasks` SET `task` = ? WHERE `id` = ?";
    $query = $pdo->prepare($request);
    $query->execute([$task, $id]);
    header("Location: todo.php"); 
}
 ?>