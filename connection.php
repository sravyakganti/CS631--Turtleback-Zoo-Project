<?php

$host = 'localhost'; 
$port = '3306';
$username = 'root'; 
$password = ''; 
$database = 'turtleback_zoo'; 

$yourDbConnection = mysqli_connect($host, $username, $password, $database, $port);

if (!$yourDbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
