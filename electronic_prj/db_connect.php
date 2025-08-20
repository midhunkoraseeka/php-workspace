<?php
$servername = "localhost";
$username   = "root";  
$password   = "";  
$dbname     = "electronic_catalogue"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Sorry, could not connect to the database: " . $conn->connect_error);
}
?>
