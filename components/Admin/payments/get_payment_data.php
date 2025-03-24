<?php
include '../../database/db.php';
if (isset($_POST['id'])) {
    $paymentId = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM payments WHERE id = $paymentId");
        $stmt->execute();
        
        $payment = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($payment) {
            echo json_encode($payment);
        } else {
            echo json_encode(['error' => 'payment not found']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error fetching payment data: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'payment ID is required']);
}
?>
