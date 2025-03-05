<?php
include 'asap.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo $exp_type=$_POST['exp_type'];
    $exp_date=$_POST['exp_date'];
    $exp_amount=$_POST['exp_amount'];
    $exp_mode=$_POST['exp_mode'];
    $exp_desc=$_POST['exp_desc'];
    
    echo $insertQuery = "INSERT INTO m_expense (exp_type, exp_date, exp_amount, exp_mode, exp_desc) VALUES (:exp_type, :exp_date, :exp_amount, :exp_mode, :exp_desc)";

    // Prepare and execute the statement
    $stmt = $conn->prepare($insertQuery);
    $stmt->bindParam(':exp_type', $exp_type);
    $stmt->bindParam(':exp_date', $exp_date);
    $stmt->bindParam(':exp_amount', $exp_amount);
    $stmt->bindParam(':exp_mode', $exp_mode);
    $stmt->bindParam(':exp_desc', $exp_desc);

    // Execute the statement
    $stmt->execute();

    // Get the last insert ID
    // $lastInsertId = $con->lastInsertId();
    // $a_type='emp';
    // $insertQuery = "INSERT INTO m_admin (a_name, a_uname, a_pass,a_type,a_img,a_uid)
    //                 VALUES ( :a_name, :a_uname, :a_pass,:a_type,:a_img,:a_uid)";

    // // Prepare and execute the statement
    // $stmt = $con->prepare($insertQuery);
    // $stmt->bindParam(':a_name', $exp_type);
    // $stmt->bindParam(':a_img', $targetFileName);
    // $stmt->bindParam(':a_uname', $emp_uname);
    // $stmt->bindParam(':a_pass', $emp_pass);
    // $stmt->bindParam(':a_type', $a_type);
    // $stmt->bindParam(':a_uid', $lastInsertId);

    // Execute the statement
    // $stmt->execute();
}
?>


<script type="text/javascript">
window.location.replace("view_expense.php?msgout=1");
</script>