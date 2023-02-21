<!DOCTYPE html>
<html>
    <head>
        <title> Sign Ip </title>
        <link rel = "stylesheet" href = "style.css">
    </head>
<!--Add funcs-->
    <body>  
        <div class="header"> 
            <a href="tasktable.php"><button id="bnn">Home</button></a>
            <a href="index.php"><button id="bnn">Sign Up</button></a>
        </div>

        <h1>Sign In</h1> 

            <form method="post">
                <label>Login</label>
                <input name = "lgn" type ="text" id ="lgn"/> 
                <label>Password</label>
                <input name = "pswrd" type ="text" id ="pswrd"/>  
                <p><input name = "btn" type="submit" id="subbtn"/></p>
            </form>
    </body>
</html>

<?php
    //Подключение к базе данных
    require "config.php";

    if(isset($_POST["btn"])){
        $login = $_POST["lgn"];
        $password = $_POST["pswrd"];

        $request = "SELECT * FROM users WHERE login = ? AND password = ?";

        $result = $pdo->prepare($request);
        $result->execute([$login, $password]);

        $res = $result->fetch();

        //Вывод логина 
        if($res) echo "<h1>".$res['login']."</h1>";
        else echo "ERROR";
    }


?>