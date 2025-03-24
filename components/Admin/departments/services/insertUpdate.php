<?php 
include '../../../database/db.php';

//$id = $_GET['edit_id'];
$dept_name = null;
if(isset($_GET['edit_id'])){
    $edit_id = intval($_GET['edit_id']);
    $getEditDept = $conn->prepare("select * from departments where id = $edit_id");
    $getEditDept->execute();
    $department = $getEditDept->fetch(PDO::FETCH_ASSOC);
    if($department){
        $dept_name = $department['name'];
    }else {
        echo "No department found with that ID.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['dept_id']){
        try{
            $dept_name = $_POST['dept_name'];
            echo $dept_name;
            $sql = "Update departments
                    SET name= '$dept_name'
                    where id= $_POST[dept_id]    
                    ";

            $conn->exec($sql);
            
            echo "$sql Edit SuccessFully";
            header("location: https://localhost/php/EMS/components/Admin/departments/department.php?status=updated");
        }
        catch(PDOException $e){
            echo "<div class='alert alert-danger' id='error-alert' role='alert'>"
                .$e->getMessage().
              "</div>";
        }
        
    }
    else{
        $name = $_POST['dept_name'];
        try{
            $sql = "INSERT INTO departments(name)
                    VALUES('$name')";
            $conn->exec($sql);
            echo "<div class='alert alert-success' id='success-alert' role='alert'>
                    New Departments Added Successfully.
                  </div>";
                  header("location: https://localhost/php/EMS/components/Admin/departments/department.php?status=inserted");
        }
        catch(PDOException $e){
            echo "<div class='alert alert-danger' id='error-alert' role='alert'>"
                .$e->getMessage().
              "</div>";
        }
    }
}

?>