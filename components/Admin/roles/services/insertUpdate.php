<?php 
include '../../../database/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //echo $_POST['role_name'];
    if($_POST['role_id']){
        try{
            $role_name = $_POST['role_name'];
            $roleDeptId = $_POST['role_department_id'];
            $sql = "Update roles
                    SET role_name= '$role_name', role_department_id=$roleDeptId
                    where id= $_POST[role_id]    
                    ";

            $conn->exec($sql);
            
            //echo "$sql Edit SuccessFully";
            header("location: https://localhost/php/EMS/components/Admin/roles/role.php?status=updated");
            exit;
        }
        catch(PDOException $e){
            echo "<div class='alert alert-danger' id='error-alert' role='alert'>"
                .$e->getMessage().
              "</div>";
        }
        
    }else{
        try{
            $name = $_POST['role_name'];
            $deptId = $_POST['role_department_id'];
            echo "insert nahi hua";
            $sql = "INSERT INTO roles(role_name, role_department_id )
                    VALUES
                    ('$name',$deptId)";
            // echo "dept ID : $deptId, ".$sql;
            $conn->exec($sql);
            
            header("location: https://localhost/php/EMS/components/Admin/roles/role.php?status=inserted");
            exit;
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }
    
}

?>