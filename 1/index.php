<!DOCTYPE html>
<html>
    <head>
        <title> Registration </title>
        <link rel = "stylesheet" href = "style.css">

    </head>
<!--Add funcs-->
    <body>  
        <div class="header"> 
            <a><button id="bnn">Home</button></a>
            <a href="sign_in.php"><button id="bnn">Sign In</button></a>
        </div>

        <h1>Sign Up</h1> 

            <form action="" method="post">
                <label>Login</label>
                <input name="lgn" type ="text" id ="lgn"/> 
                <label>Password</label>
                <input name="pswrd" type ="text" id ="pswrd"/>  
                <label>Confirm Password </label>
                <input name="cpswrd" type="text" id="cpswrd"/> 
                <p><input name=" btn" type="submit" id="subbtn"/></p>
            </form>
    </body>
</html> 

<?php   
    //Задаем парметры для подключения к базе данных
    define('hostName', "localhost");
    define('bdName', "project");
    define('userName', "root");
    define('password', "");

    //Создаем соединение с базой данных
    $conn = new PDO('mysql:host='.hostName.'; bdname='.bdName, userName, password);

    //Проверка нажатия на ккнопку
    if(isset($_POST["btn"])){
        $login = $_POST["lgn"];
        $password = $_POST["pswrd"];
        $cpassword = $_POST["cpswrd"];

        $request = "INSERT INTO users(login, password) VALUES(?,?)"; 

       // $start = mysqli_stmt_init($conn);
    }
?>