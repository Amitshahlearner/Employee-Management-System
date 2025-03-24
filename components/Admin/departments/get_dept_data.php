<?php
include '../../database/db.php';
if (isset($_POST['id'])) {
    $deptId = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM departments WHERE id = $deptId");
        $stmt->execute();
        
        $dept = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($dept) {
            echo json_encode($dept);
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
