<?php
// Database connection
include 'asap.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // $lab_id = $_POST['lab_id'];
    $emp_id = $_POST['emp_id'];

    // Fetch labense details
     
    echo $lab_date=$_POST['lab_date'];
    $lab_mode=$_POST['lab_mode'];
    $lab_amount=$_POST['lab_amount'];
    $lab_desc=$_POST['lab_desc'];

    // Execute the statement
    // $stmt->execute();

    // Fetch employee name
    $stmt = $conn->prepare("SELECT emp_name FROM m_employee WHERE emp_id = :emp_id");
    $stmt->execute(['emp_id' => $emp_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $emp_name = $row['emp_name'];
    } else {
        // Handle case when employee is not found
        $emp_name = "Unknown Employee";
    }
    // Fetch employee name
$stmt = $conn->prepare("SELECT emp_name FROM m_labour WHERE emp_id = :emp_id");
$stmt->execute(['emp_id' => $emp_id]);
$row = $stmt->fetch();

    
    // Prepare and execute SQL query
    $sql = "INSERT INTO m_labour (emp_id, emp_name, lab_date, lab_mode, lab_amount, lab_desc)
            VALUES ( :emp_id, :emp_name, :lab_date, :lab_mode, :lab_amount, :lab_desc)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':emp_id', $emp_id);
    $stmt->bindParam(':emp_name', $emp_name); // Bind employee name
    $stmt->bindParam(':lab_date', $lab_date);
    $stmt->bindParam(':lab_mode', $lab_mode);
    $stmt->bindParam(':lab_amount', $lab_amount);
    $stmt->bindParam(':lab_desc', $lab_desc);

    try {
        $stmt->execute();
        // Redirect to view_projects.php after successful insertion
        header("Location: view_labour.php?msgout=1");
        exit(); // Ensure script execution stops here
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
?>
