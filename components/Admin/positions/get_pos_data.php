<?php
include '../../database/db.php';
if (isset($_POST['id'])) {
    $posId = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM positions WHERE id = $posId");
        $stmt->execute();
        
        $pos = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($pos) {
            echo json_encode($pos);
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
