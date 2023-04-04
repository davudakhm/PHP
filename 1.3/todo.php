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
<!--<form action="up.php" method="post">
			<input name="update" type="text">
			<input name="su" type="submit">
	</form>-->
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
			echo '<div><li>'. $row->task .' <a href="delete.php?id='.$row->id.'" id="card-link-click">X</a> <a>⠀</a> <a href="update.php?id='.$row->id.'" id="card-link-click"> Change </a> </li>' . ' </div>'; 
	  	?>
	</ul>
</body>
</html>