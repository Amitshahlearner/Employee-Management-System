<?php
include '../../database/db.php';
if (isset($_POST['id'])) {
    $projectId = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM projects WHERE id = $projectId");
        $stmt->execute();
        
        $project = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($project) {
            echo json_encode($project);
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
