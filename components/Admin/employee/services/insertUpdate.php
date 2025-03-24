<?php
include '../../database/db.php';

$id = $_GET['edit_id'];

$emp_name=null;
$emp_email=null;
$emp_phone=null;
$emp_gender=null;
$emp_department_id=null;
$emp_dob=null;
$emp_joining_date=null;
$emp_address=null;
$emp_status=null;

if(isset($id)){
    $edit_id = intval($_GET['edit_id']);
    $sql = "select * from employee where id=$edit_id";
    $getEditEmp = $conn->prepare($sql);
    $getEditEmp->execute();
    $emp = $getEditEmp->fetch(PDO::FETCH_ASSOC);
    // print_r($role);
    if($emp){
        $emp_name = $emp['emp_name'];
        $emp_email = $emp['emp_email'];
        $emp_phone = $emp['emp_phone'];
        $emp_gender = $emp['emp_gender'];
        $emp_department_id = $emp['emp_department_id'];
        $emp_dob = $emp['emp_dob'];
        $emp_joining_date = $emp['emp_joining_date'];
        $emp_address = $emp['emp_address'];
        $emp_status = $emp['emp_status'];
    }else {
        echo "No department found with that ID.";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['emp_name'];
    $email = $_POST['emp_email'];
    $phone = $_POST['emp_phone'];
    $gender = $_POST['emp_gender'];
    $department_id = $_POST['emp_department_id'];
    $dob = $_POST['emp_dob'];
    $image = $_POST['emp_image'];
    $joining_date = $_POST['emp_joining_date'];
    $address = $_POST['emp_address'];
    $status = $_POST['emp_status'];
    $password = $_POST['password'];
    $roleValue = $_POST['roleValue'];
    $projectValue = $_POST['projectValue'];
    $emp_position_id = $_POST['emp_position_id'];

    if($_POST['emp_id']){
        try{
            $employee_id = $_POST['emp_id'];
            $employee = "Update employee
                    SET emp_name= '$name', emp_email='$email', emp_phone='$phone', emp_gender='$gender', 
                    emp_department_id='$department_id', emp_dob='$dob', emp_image='$image', emp_joining_date='$joining_date',
                    emp_address='$address',emp_status='$status',emp_password = '$password'
                    where id= $_POST[emp_id]    
                    ";
            
            $conn->exec($employee);
            
            $roles = [];
            foreach ($roleValue as $role_id) {
                $roles[] = $role_id;
            }
            
            $roles_string ="[". implode(",", $roles)."]";

            $role_value = json_encode($roleValue);
            
            $employee_has_roles = "UPDATE employee_has_roles
                                    set role_id='$role_value'
                                    WHERE employee_id=$employee_id
                                    ";
                                    
            $conn->exec($employee_has_roles);

            $project_value = json_encode($projectValue);

            $employee_has_projects = "UPDATE employee_has_projects
                                        set project_id=$project_value
                                        WHERE employee_id=$employee_id
                                    ";
            $conn->exec($employee_has_projects);

            $employee_has_position = "UPDATE employee_has_position
                                        set position_id=$emp_position_id
                                        WHERE employee_id=$employee_id
                                    ";
            $conn->exec($employee_has_position);
            //echo "$sql Edit SuccessFully";
            header("location: https://localhost/php/EMS/components/Admin/employee/employee.php?status=updated");
            exit;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        try {
            $employee = "INSERT INTO employee(emp_name,emp_email,emp_phone,emp_gender,
                                        emp_department_id,emp_dob,emp_image,emp_joining_date,
                                        emp_address,emp_password,emp_status)
                    VALUES
                    ('$name','$email','$phone','$gender','$department_id',
                    '$dob','$image','$joining_date','$address',
                    '$password','$status')";

            
            $conn->exec($employee);

            $employee_id = $conn->lastInsertId();
           
            $role_value = json_encode($roleValue);
            
            $employee_has_roles = "INSERT INTO employee_has_roles(employee_id,role_id)
                                    Values ($employee_id,'$role_value')
                                    ";
                                    
            $conn->exec($employee_has_roles);

            $project_value = json_encode($projectValue);

            $employee_has_projects = "INSERT INTO employee_has_projects(employee_id,project_id)
                                        Values ($employee_id,'$project_value')
                                ";
                                echo $employee_has_projects;
            $conn->exec($employee_has_projects);

            $employee_has_position = "INSERT INTO employee_has_position(employee_id,position_id)
                                        Values ($employee_id,$emp_position_id)
                                ";
            $conn->exec($employee_has_position);

            header("location: https://localhost/php/EMS/components/Admin/employee/employee.php?status=inserted");
            exit;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    

}

?>