<?php
include "asap.php";
$emp_id = $_GET["emp_id"];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM `m_labour` WHERE emp_id = :emp_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':emp_id', $emp_id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: view_labour.php?msg=Data deleted successfully");
} catch(PDOException $e) {
    echo "Failed: " . $e->getMessage();
}
?>