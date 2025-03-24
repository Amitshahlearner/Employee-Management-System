<?php 
include '../../../database/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $empId = $_POST['emp_id'];
    $pay_date = $_POST['pay_date'];
    $gross_salary = $_POST['gross_salary'];
    $deduction_on_salary = $_POST['deduction_on_salary'];
    $net_salary = $_POST['net_salary'];
    if($_POST['payment_id']){
        try{
            $sql = "Update payments
                    SET employee_id = $empId, pay_date= '$pay_date', gross_salary=$gross_salary,
                    deduction_on_salary=$deduction_on_salary, net_salary = $net_salary
                    where id= $_POST[payment_id]    
                    ";

            $conn->exec($sql);
            
            //echo "$sql Edit SuccessFully";
            header("location: https://localhost/php/EMS/components/Admin/payments/payment.php?status=updated");
            exit;
        }
        catch(PDOException $e){
            echo "<div class='alert alert-danger' id='error-alert' role='alert'>"
                .$e->getMessage().
              "</div>";
        }
        
    }else{
        try{
    
            $sql = "INSERT INTO payments(employee_id, pay_date, gross_salary, deduction_on_salary, net_salary )
                    VALUES
                    ( $empId,'$pay_date',$gross_salary ,$deduction_on_salary, $net_salary )";
            // echo $sql;
            $conn->exec($sql);
            
            header("location: https://localhost/php/EMS/components/Admin/payments/payment.php?status=inserted");
            exit;
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }
    
}

?>