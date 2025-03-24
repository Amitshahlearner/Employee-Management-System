<?php 

$username = "root";
$password = "";

$conn = new PDO("mysql:host=localhost", $username, $password);

$sql = "CREATE DATABASE employee_management";

if($conn->exec($sql)){
    echo "Successfully created";
}else{
    echo "Failed to create";
}

?>