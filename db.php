<?php
$host = "localhost";  
$username = "root";   
$password = "";       
$database = "BlogDB"; 


$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
