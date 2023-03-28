<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>TO-DO List</title>
</head>
<body>
	<form action="addtask.php" method="POST">
		<input type="text" name="task" required>
		<input type="submit" value="Add">
	</form>
<p>    </p>
	<form action="update.php" method=" POST">
			<input name="update" type="text">
			<input name="su" type="submit" value="Change">
	</form>
	
	<ul>
	  	<?php
	    session_start();
		if($_SESSION == null){
			header("Location: index.php");
		  }
	    require "config.php";

	    $request = "SELECT * FROM tasks WHERE loginUser = ?";

	    $result = $pdo->prepare($request);
	    $result->execute([$_SESSION['uname']]);

		while($row = $result->fetch(PDO::FETCH_OBJ)) 
			echo '<div><li>'. $row->task .' <a href="delete.php?id='.$row->id.'" id="card-link-click">X</a> <a href="update.php?id='.$row->id.'" id="card-link-click">Y</a></li>' . ' </div>'; 
	   //foreach($result as $res)
	   // //вывод таблицы
	   //echo '<div><li>'. $row->task .' <a href="delete.php?id='.$row->id.'" id="card-link-click">X</a></li>' . ' </div>';

	  	?>

		<?php

		//require 'config.php';

		//$query = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");

		//while($row = $query->fetch(PDO::FETCH_OBJ)) {
		//		echo '<div><li>'. $row->title .' <a href="delete.php?id='.$row->id.'" id="card-link-click">X</a></li>' . ' </div>';

		//	}
		 ?>
		 
		 
	</ul>
</body>
</html>