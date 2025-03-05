<?php
include 'asap.php';

// Assuming $con is your PDO connection object
$emp_id = $_GET['emp_id'];

try {
    // Prepare the update query
    $query = "UPDATE m_employee SET emp_status = 'active' WHERE emp_id = :emp_id";
    $stmt = $conn->prepare($query);

    // Bind the parameter
    $stmt->bindParam(':emp_id', $emp_id);

    // Execute the query
    $stmt->execute();

    // Redirect to view_vehicle.php with message
    header("Location: view_employee.php?msgout=1");
    exit(); // Ensure script stops executing after redirection
} catch (PDOException $e) {
    // Handle PDO exception
    echo "Error: " . $e->getMessage();
}
?>