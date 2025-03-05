<?php
include "asap.php";
$exp_id = $_GET["exp_id"];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM `m_expense` WHERE exp_id = :exp_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':exp_id', $exp_id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: view_expense.php?msg=Data deleted successfully");
} catch(PDOException $e) {
    echo "Failed: " . $e->getMessage();
}
?>