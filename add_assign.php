<?php
// Database connection
include 'asap.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $emp_id = $_POST['emp_id'];
    $cmp_id = $_POST['cmp_id'];

// Fetch employee name
$stmt = $conn->prepare("SELECT emp_name FROM m_employee WHERE emp_id = :emp_id");
$stmt->execute(['emp_id' => $emp_id]);
$row = $stmt->fetch();
if ($row) {
    $emp_name = $row['emp_name'];
} else {
    // Handle case when employee is not found
    $emp_name = "Unknown Employee";
}

// Fetch employee name
$stmt = $conn->prepare("SELECT emp_name FROM m_assign WHERE emp_id = :emp_id and cmp_id=:cmp_id");
$stmt->execute(['emp_id' => $emp_id, 'cmp_id' => $cmp_id]);
$row = $stmt->fetch();

    $check_emp_name = $row['emp_name'];


// Fetch company name
$stmt = $conn->prepare("SELECT cmp_name FROM m_site WHERE cmp_id = :cmp_id");
$stmt->execute(['cmp_id' => $cmp_id]);
$row = $stmt->fetch();
if ($row) {
    $cmp_name = $row['cmp_name'];
} else {
    // Handle case when company is not found
    $cmp_name = "Unknown Company";
}
if($check_emp_name==''){
// Prepare and execute SQL query
$sql = "INSERT INTO m_assign (emp_id, cmp_id, emp_name, cmp_name)
        VALUES (:emp_id, :cmp_id, :emp_name, :cmp_name)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':emp_id', $emp_id);
$stmt->bindParam(':cmp_id', $cmp_id);
$stmt->bindParam(':emp_name', $emp_name);
$stmt->bindParam(':cmp_name', $cmp_name);

try {
    $stmt->execute();
    
    header("Location: view_assign.php?cmp_id=$cmp_id");
    exit(); // Ensure script execution stops here
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}else{
?>
<script>
    window.alert('The employee is already assigned to this site');
    window.location.replace("view_assign.php?cmp_id=<?php echo $cmp_id; ?>");
</script>
<?php
}
}
?>
