<?php
include '../../database/db.php';
if (isset($_POST['id'])) {
    $permissionId = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM permissions WHERE id = $permissionId");
        $stmt->execute();
        
        $permission = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($permission) {
            echo json_encode($permission);
        } else {
            echo json_encode(['error' => 'permission not found']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error fetching permission data: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'permission ID is required']);
}
?>
