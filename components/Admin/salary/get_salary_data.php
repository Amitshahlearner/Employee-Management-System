<?php
include '../../database/db.php';
if (isset($_POST['id'])) {
    $salaryId = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM salary WHERE id = $salaryId");
        $stmt->execute();
        
        $salary = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($salary) {
            echo json_encode($salary);
        } else {
            echo json_encode(['error' => 'Salary not found']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error fetching salary data: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'salary ID is required']);
}
?>
