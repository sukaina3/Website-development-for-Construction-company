<?php
include "asap.php";
$emp_id = $_GET["emp_id"];
$cmp_id = $_GET["cmp_id"];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM `m_attendance` WHERE emp_id = :emp_id AND cmp_id = :cmp_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':emp_id', $emp_id, PDO::PARAM_INT);
    $stmt->bindParam(':cmp_id', $cmp_id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: view_attendance.php?cmp_id=$cmp_id");
} catch(PDOException $e) {
    echo "Failed: " . $e->getMessage();
}
?>