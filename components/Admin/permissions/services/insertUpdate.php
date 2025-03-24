<?php 
include '../../../database/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['permission_id']){
        try{
            $permission_name = $_POST['permission_name'];
            echo $permission_name;
            $sql = "Update permissions
                    SET permission_name= '$permission_name'
                    where id= $_POST[permission_id]    
                    ";

            $conn->exec($sql);
            
            echo "$sql Edit SuccessFully";
            header("location: https://localhost/php/EMS/components/Admin/permissions/permission.php?status=updated");
        }
        catch(PDOException $e){
            echo "<div class='alert alert-danger' id='error-alert' role='alert'>"
                .$e->getMessage().
              "</div>";
        }
        
    }
    else{
        $name = $_POST['permission_name'];
        try{
            $sql = "INSERT INTO permissions(permission_name)
                    VALUES('$name')";
            $conn->exec($sql);
            echo "<div class='alert alert-success' id='success-alert' role='alert'>
                    New permissions Added Successfully.
                  </div>";
                  header("location: https://localhost/php/EMS/components/Admin/permissions/permission.php?status=inserted");
        }
        catch(PDOException $e){
            echo "<div class='alert alert-danger' id='error-alert' role='alert'>"
                .$e->getMessage().
              "</div>";
        }
    }
}

?>