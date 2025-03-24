<?php 
include '../../../database/db.php';
$pos_name = null;
$pos_dept_id = null;

if(isset($_GET['edit_id'])){
    $edit_id = intval($_GET['edit_id']);
    $sql = "select * from positions where id=$edit_id";
    $getEditPosition = $conn->prepare($sql);
    $getEditPosition->execute();
    $position = $getEditPosition->fetch(PDO::FETCH_ASSOC);
    // print_r($role);
    if($position){
        $pos_name = $position['pos_name'];
        $pos_dept_id = $position['pos_department_id'];
    }else {
        echo "No department found with that ID.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo $_POST['pos_name'];
    if($_POST['pos_id']){
        try{
            $pos_name = $_POST['pos_name'];
            $posDeptId = $_POST['pos_department_id'];
            $sql = "Update positions
                    SET pos_name= '$pos_name', pos_department_id=$posDeptId
                    where id= $_POST[pos_id]    
                    ";

            $conn->exec($sql);
            
            echo "$sql Edit SuccessFully";
            header("location: https://localhost/php/EMS/components/Admin/positions/position.php?status=updated");
        }
        catch(PDOException $e){
            echo "<div class='alert alert-danger' id='error-alert' role='alert'>"
                .$e->getMessage().
              "</div>";
        }
        
    }else{
        try{
            $name = $_POST['pos_name'];
            $deptId = $_POST['pos_department_id'];
    
            $sql = "INSERT INTO positions(pos_name, pos_department_id )
                    VALUES
                    ('$name',$deptId)";
            // echo "dept ID : $deptId, ".$sql;
            $conn->exec($sql);
            echo "<div class='alert alert-success' id='success-alert' role='alert'>
                    New Roles Added Successfully.
                </div>";
          header("location: https://localhost/php/EMS/components/Admin/positions/position.php?status=inserted");
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }
    
}

?>