<?php
// Database connection
include 'asap.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $exp_id = $_POST['exp_id'];
    $cmp_id = $_POST['cmp_id'];

    // Fetch expense details
    $stmt = $conn->prepare("SELECT exp_amount, exp_date, exp_mode, exp_desc FROM m_expense WHERE exp_id = :exp_id");
    $stmt->execute(['exp_id' => $exp_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $exp_amount = $row['exp_amount'];
        $exp_date = $row['exp_date'];
        $exp_mode = $row['exp_mode'];
        $exp_desc = $row['exp_desc'];
    } else {
        // Handle case when expense is not found
        $exp_amount = "Unknown Amount";
        $exp_date = "Unknown Date";
        $exp_mode = "Unknown Type";
        $exp_desc = "Unknown Description";
    }

    // Fetch company name
    $stmt = $conn->prepare("SELECT cmp_name FROM m_site WHERE cmp_id = :cmp_id");
    $stmt->execute(['cmp_id' => $cmp_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $cmp_name = $row['cmp_name'];
    } else {
        // Handle case when company is not found
        $cmp_name = "Unknown Company";
    }
    $stmt = $conn->prepare("SELECT cmp_name FROM m_income WHERE cmp_id = :cmp_id");
$stmt->execute(['cmp_id' => $cmp_id]);
$row = $stmt->fetch();

    $check_cmp_name = $row['cmp_name'];
if($check_cmp_name==''){
    // Prepare and execute SQL query
    $sql = "INSERT INTO m_income (exp_id, cmp_id, cmp_name, exp_amount, exp_date, exp_mode, exp_desc)
            VALUES (:exp_id, :cmp_id, :cmp_name, :exp_amount, :exp_date, :exp_mode, :exp_desc)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':exp_id', $exp_id);
    $stmt->bindParam(':cmp_id', $cmp_id);
    $stmt->bindParam(':cmp_name', $cmp_name); // Bind company name
    $stmt->bindParam(':exp_amount', $exp_amount);
    $stmt->bindParam(':exp_date', $exp_date);
    $stmt->bindParam(':exp_mode', $exp_mode);
    $stmt->bindParam(':exp_desc', $exp_desc);

    try {
        $stmt->execute();
        // Redirect to view_projects.php after successful insertion
        header("Location: view_income.php?msgout=1");
        exit(); // Ensure script execution stops here
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}else{
    ?>
    <script>
        window.alert('The site is already added');
        window.location.replace("view_income.php?msgout=1");
    </script>
    <?php
}
}
?>
