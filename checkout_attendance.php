<?php
include 'asap.php';

// Check if emp_id and cmp_id are set in the $_GET array

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $att_checkout = $_POST['att_checkout'];
    $att_pay = $_POST['att_pay'];
    $att_id=$_POST['att_id'];
    $cmp_id=$_POST['cmp_id'];

    // Insert into m_attendance table
    $sql = "UPDATE m_attendance SET att_checkout=:att_checkout, att_pay=:att_pay, att_status= 'Completed' WHERE att_id=:att_id";
            
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':att_checkout', $att_checkout);
    $stmt->bindParam(':att_pay', $att_pay);
    $stmt->bindParam(':att_id', $att_id);
    $stmt->execute();

    // Redirect to view_attendance.php after insertion
    header("Location: view_attendance.php?cmp_id=$cmp_id");
    exit();
}
?>