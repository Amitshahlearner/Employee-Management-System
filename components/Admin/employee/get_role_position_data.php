<?php
include '../../database/db.php';
if (isset($_POST['id'])) {
    $deptId = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM roles where role_department_id = $deptId");
        $stmt->execute();
        
        $pos = $conn->prepare("SELECT * FROM positions where pos_department_id = $deptId");
        $pos->execute();

        $role = $stmt->fetchAll();
        $position = $pos->fetchAll();

        $data = array_merge($role,$position);
        
        if ($data) {
            echo json_encode($data);
            
        } else {
            echo json_encode(['error' => 'role not found']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error fetching role data: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'role ID is required']);
}
?>
