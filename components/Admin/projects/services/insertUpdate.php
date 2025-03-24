<?php 
include '../../../database/db.php';
$project_name = null;
$project_status = null;

if(isset($_GET['edit_id'])){
    $edit_id = intval($_GET['edit_id']);
    $sql = "select * from projects where id=$edit_id";
    $getEditProject = $conn->prepare($sql);
    $getEditProject->execute();
    $project = $getEditProject->fetch(PDO::FETCH_ASSOC);
    // print_r($role);
    if($project){
        $project_name = $project['project_name'];
        $project_status = $project['status'];
    }else {
        echo "No department found with that ID.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo "project status = ".$_POST['project_status']."hai";
    if($_POST['project_id']){
        //echo $_POST['project_id'];
        try{
            $project_name = $_POST['project_name'];
            $project_status = $_POST['project_status'];
            $sql = "Update projects
                    SET project_name= '$project_name', status='$project_status'
                    where id= $_POST[project_id]    
                    ";

            $conn->exec($sql);
            
            echo "$sql Edit SuccessFully";
            header("location: https://localhost/php/EMS/components/Admin/projects/project.php?status=updated");
        }
        catch(PDOException $e){
            echo "<div class='alert alert-danger' id='error-alert' role='alert'>"
                .$e->getMessage().
              "</div>";
        }
        
    }else{
        try{
            $name = $_POST['project_name'];
            $project_status = $_POST['project_status'];
    
            $sql = "INSERT INTO projects(project_name, status )
                    VALUES
                    ('$name','$project_status')";
            // echo "dept ID : $deptId, ".$sql;
            $conn->exec($sql);
            echo "<div class='alert alert-success' id='success-alert' role='alert'>
                    New Roles Added Successfully.
                </div>";
          header("location: https://localhost/php/EMS/components/Admin/projects/project.php?status=inserted");
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }
    
}

?>