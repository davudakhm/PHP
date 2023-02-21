<?php
    //Задаем парметры для подключения к базе данных
    $serverName = "localhost";
    $dbName = "project";
    $userName = "root";
    $password = "";

    //Создаем соединение с базой данных
    $pdo = new PDO("mysql:host=$serverName; dbname=$dbName", $userName, $password);
?>