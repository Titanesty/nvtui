<?php
$bd_server = "localhost";

$bd_login = 'namebaza';//логин базы данных

$bd_pass = 'pass';//пароль базы данных

$bd_name = 'namebaza';//имя базы данных

 $mysqli = new mysqli($bd_server, $bd_login, $bd_pass, $bd_name)//параметры в скобках ("хост", "имя пользователя", "пароль")
or die("<p>Ошибка подключения к базе данных!</p>");
$mysqli->query("SET NAMES utf8");
?>