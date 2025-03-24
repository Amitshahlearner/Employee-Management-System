<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "employee_management";

try{
    $conn =  new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
    echo "Connection Error:" . $err->getMessage();
}
?>