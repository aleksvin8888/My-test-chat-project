<?php 
// данные для подключения к базе данных
$server = "localhost";
$username = "root";
$password = "";
$bdname = "chat";

// подключения к базе chat
$connect = mysqli_connect($server, $username, $password, $bdname);
// кодировка базы даных
mysqli_set_charset($connect, 'utf8');
?>



