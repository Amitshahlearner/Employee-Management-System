<?php 
include '../../../database/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $empId = $_POST['emp_id'];
    $base_salary = $_POST['base_salary'];
    $salary_allowance = $_POST['salary_allowance'];
    $salary_bonus = $_POST['salary_bonus'];
    $total_salary = $_POST['total_salary'];
    if($_POST['salary_id']){
        try{
            $sql = "Update salary
                    SET employee_id = $empId, base_salary= $base_salary, allowance=$salary_allowance,
                        bonus=$salary_bonus, total = $total_salary
                    where id= $_POST[salary_id]    
                    ";

            $conn->exec($sql);
            
            //echo "$sql Edit SuccessFully";
            header("location: https://localhost/php/EMS/components/Admin/salary/salary.php?status=updated");
            exit;
        }
        catch(PDOException $e){
            echo "<div class='alert alert-danger' id='error-alert' role='alert'>"
                .$e->getMessage().
              "</div>";
        }
        
    }else{
        try{
    
            $sql = "INSERT INTO salary(employee_id, base_salary, allowance, bonus, total )
                    VALUES
                    ( $empId,$base_salary,$salary_allowance ,$salary_bonus, $total_salary )";
            // echo "dept ID : $deptId, ".$sql;
            $conn->exec($sql);
            
            header("location: https://localhost/php/EMS/components/Admin/salary/salary.php?status=inserted");
            exit;
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }
    
}

?>