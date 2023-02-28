<?php
    session_start();

    $task =  $_POST['task'];

    require "config.php";

    $request = "INSERT INTO tasks(task, loginUser, isDone) VALUES (?, ?, ?)";

    $result = $pdo->prepare($request);
    $result->execute([$task, $_SESSION['uname'], 0]);

    header("Location: tasktable.php");
?>