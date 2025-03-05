<?php
include "asap.php";
$emp_id = $_GET["exp_id"];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM `m_income` WHERE exp_id = :exp_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':exp_id', $emp_id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: view_income.php?msg=Data deleted successfully");
} catch(PDOException $e) {
    echo "Failed: " . $e->getMessage();
}
?>