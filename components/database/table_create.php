<?php

$username = "root";
$password = "";
$database = "employee_management";

$conn = new PDO("mysql:host=localhost;dbname=$database", $username, $password);

$employee = "CREATE TABLE employee(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        emp_name VARCHAR(255) NOT NULL,
        emp_email VARCHAR(255) NOT NULL UNIQUE,
        emp_password varchar(25) NOT NULL,
        emp_phone int(20),
        emp_dob INTEGER NOT NULL,
        emp_address TEXT NOT NULL,
        emp_gender ENUM('M','F','O') NOT NULL,
        emp_image varchar(255),
        emp_joining_date Date NOT NULL,
        emp_status ENUM('0','1') NOT NULL,
        emp_department_id int ,
        emp_salary_id int ,
        FOREIGN KEY (emp_department_id) references departments(id),
        FOREIGN KEY (emp_salary_id) references salary(id)
)";

$department = "CREATE TABLE departments(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL
)";

$salary = "CREATE TABLE salary(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    base_salary int NOT NULL,
    allowance int,
    bounus int,
    total int NOT NULL
)";

$position = "CREATE TABLE positions(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    pos_name varchar(255),
    pos_department_id int NOT NUll,
    FOREIGN KEY (pos_department_id) references departments(id)
)";

$role = "CREATE TABLE roles(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    role_name varchar(255),
    role_department_id int NOT NULL,
    FOREIGN KEY (role_department_id) references departments(id)
)";

$project = "CREATE TABLE projects(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    project_name varchar(255)
)";


try{
    
    $conn->query($department);
    $conn->query($salary);
    $conn->query($employee);
    $conn->query($position);
    $conn->query($role);
    $conn->query($project);
    echo "Table created successfully";
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}

?>