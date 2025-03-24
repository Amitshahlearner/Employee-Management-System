<?php

$requestUri = $_SERVER['REQUEST_URI'];

if (strpos($requestUri, 'employee/employee.php') !== false && strpos($requestUri, 'add_employee.php') === false) {
    include "employee_content.php";
} elseif (strpos($requestUri, 'index.php') !== false) {
    print_r($_POST);
} elseif (strpos($requestUri, 'employee/add_employee.php') !== false) {
    include "add_employee_content.php";
} elseif (strpos($requestUri, 'departments/department.php') !== false && strpos($requestUri, 'add_department.php') === false) {
    include "department_content.php";
} elseif (strpos($requestUri, 'departments/add_department.php') !== false) {
    include "add_department_content.php";
} elseif (strpos($requestUri, 'roles/role.php') !== false) {
    include "role_content.php";
} elseif (strpos($requestUri, 'salary/salary.php') !== false) {
    include "salary_content.php";
} elseif (strpos($requestUri, 'positions/position.php') !== false) {
    include "position_content.php";
} elseif (strpos($requestUri, 'projects/project.php') !== false) {
    include "project_content.php";
} elseif (strpos($requestUri, 'permissions/permission.php') !== false) {
    include "permission_content.php";
} elseif (strpos($requestUri, 'payments/payment.php') !== false) {
    include "payment_content.php";
} 

?>