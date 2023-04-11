<?php
  session_start();

  if($_SESSION != null){
    header("Location: todo.php");
  }
?>
<!DOCTYPE html>

<html>

<head>

    <title>SUGN UP</title>

    <link rel="stylesheet" type="text/css" href="stylev2.css">

</head>

<body>

     <form action="" method="post">

        <h2>SIGN UP</h2>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit" name = "sub">Sing Up</button>
        <button type="submit" name = "lgn">Sign In</button>
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
      $request = "INSERT INTO users(login, password) VALUES (?,?)"; 
      //Отправляем данные в базу данных (21.02.2023)
      $result = $pdo->prepare($request);
      $result->execute([$login, $password]);
      if($result) echo "Success";
      else echo "ERROR";
      
      
  }

    if(isset($_POST["lgn"])){
        echo   '<script type="text/javascript">
                    window.open("login.php", "_self");
                </script>';
    }

    if(isset($_POST["tdo"])){
        echo   '<script type="text/javascript">
                    window.open("tasktable.php", "_self");
                </script>';
    }
?>