<?php

$servername = "localhost"; 
$username = "root";         
$password = "";       
$dbname = "sample";       


$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);


if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
?>
