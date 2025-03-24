<?php
include '../../database/db.php';
if (isset($_POST['id'])) {
    $roleId = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM roles WHERE id = $roleId");
        $stmt->execute();
        
        $role = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($role) {
            echo json_encode($role);
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
