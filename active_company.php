<?php
include 'asap.php';

// Assuming $con is your PDO connection object
$cmp_id = $_GET['cmp_id'];

try {
    // Prepare the update query
    $query = "UPDATE m_site SET cmp_status = 'active' WHERE cmp_id = :cmp_id";
    $stmt = $conn->prepare($query);

    // Bind the parameter
    $stmt->bindParam(':cmp_id', $cmp_id);

    // Execute the query
    $stmt->execute();

    // Redirect to view_vehicle.php with message
    header("Location: view_site.php?msgout=1");
    exit(); // Ensure script stops executing after redirection
} catch (PDOException $e) {
    // Handle PDO exception
    echo "Error: " . $e->getMessage();
}
?>