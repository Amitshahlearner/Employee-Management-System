<?php
include '../../database/db.php';
if (isset($_POST['id'])) {
    $employeeId = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM employee WHERE id = $employeeId");
        $stmt->execute();

        $roles = $conn->prepare("SELECT role_id FROM employee_has_roles WHERE employee_id = $employeeId");
        $roles->execute();
        
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);
        $roles = $roles->fetch(PDO::FETCH_ASSOC);
        $role_id = json_decode($roles);
        
        
        if ($employee) {
            echo json_encode($employee);
        } else {
            echo json_encode(['error' => 'Employee not found']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error fetching employee data: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'employee ID is required']);
}
?>
