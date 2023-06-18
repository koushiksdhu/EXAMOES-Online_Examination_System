<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "examoes_exam";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("<h2>Database Connection Failure : " . $conn->connect_error . "</h2><hr>");
} 
?>