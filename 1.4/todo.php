<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="themes.css">
	<title>TO-DO List</title>
</head>
<body>
<form class="color-picker" action="">
  <fieldset>
    <legend class="visually-hidden">Pick a color scheme</legend>
    <label for="light" class="visually-hidden">Light</label>
    <input type="radio" name="theme" id="light" checked>

    <label for="blue" class="visually-hidden">Blue theme</label>
    <input type="radio" id="blue" name="theme">

    <label for="dark" class="visually-hidden">Dark theme</label>
    <input type="radio" id="dark" name="theme">
  </fieldset>
</form>
	<form class ="main" action="addtask.php" method="POST">
		<fieldse>
			<input type="text" name="task" required>
			<input type="submit" value="Add" style="margin-top: 10px;">
		</fieldse>
		
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
