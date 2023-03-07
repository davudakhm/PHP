<?php
  session_start();

  if($_SESSION != null){
    header("Location: tasktable.php");
  }
?>

<!DOCTYPE html>

<html>

<head>

    <title>SUGN IN</title>

    <link rel="stylesheet" type="text/css" href="stylev2.css">

</head>

<body>

     <form action="" method="post">

        <h2>SIGN IN</h2>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit" name = "sub">Sign In</button>
        <button type="submit" name = "sgn">Sign Up</button>
        <button type="submit" name = "tdo">To Do</button>

     </form>

</body>
</html>

<?php   
//Подключение к базе данных
 require "config.php";
 //Проверка нажатия на ккнопку
 if(isset($_POST["sub"])){
     $login = $_POST["uname"];
     $password = $_POST["password"];
    // $cpassword = $_POST["cpswrd"];
     $request = "SELECT * FROM users WHERE login = ? AND password = ?"; 
     //Отправляем данные в базу данных (21.02.2023)
     $result = $pdo->prepare($request);
     $result->execute([$login, $password]);
     if($result) echo "Success";
     else echo "ERROR";

     if($row = $result->fetch()){

      $_SESSION['uname'] = $row['login'];

      header("Location: tasktable.php");
      
    }
 }

    if(isset($_POST["sgn"])){
        echo   '<script type="text/javascript">
                    window.open("index.php", "_self");
                </script>';
    }

    if(isset($_POST["tdo"])){
        echo   '<script type="text/javascript">
                    window.open("tasktable.php", "_self");
                </script>';
    }
?>