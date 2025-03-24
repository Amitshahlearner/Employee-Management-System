<?php 
include '../../../database/db.php';

$id = $_GET['delete_id'];

if(isset($id)){
    try{
        $sql = "DELETE from positions where id= $id";
        $conn->exec($sql);
        echo "<div class='alert alert-success' id='success-alert' role='alert'>
                  Position Deleted Successfully.
               </div>"; 
        header("location: https://localhost/php/EMS/components/Admin/positions/position.php?status=deleted");
    }
    catch(PDOException $e){
        echo "<div class='alert alert-danger' id='error-alert' role='alert'> delete"
            .$e->getMessage().
          "</div>";
    }
}

?>