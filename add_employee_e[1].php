<?php
include 'asap.php';

$emp_status='active';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo $emp_name=$_POST['emp_name'];
    $emp_gender=$_POST['emp_gender'];
    $emp_dob=$_POST['emp_dob'];
    $emp_age=$_POST['emp_age'];
    $emp_ph_no=$_POST['emp_ph_no'];
    $emp_aadhar=$_POST['emp_aadhar'];
    $emp_pan=$_POST['emp_pan'];
    $emp_mail=$_POST['emp_mail'];
    $emp_state=$_POST['emp_state'];
    $emp_district=$_POST['emp_district'];
    $emp_country=$_POST['emp_country'];
    $emp_esi_no=$_POST['emp_esi_no'];
    $emp_cost_per_day=$_POST['emp_cost_per_day'];
    $emp_uname=$_POST['emp_uname'];
    $emp_pass=$_POST['emp_pass'];
    
    echo $insertQuery = "INSERT INTO m_employee (emp_name, emp_gender, emp_dob, emp_age, emp_ph_no, emp_aadhar, emp_pan, emp_mail, emp_district, emp_state, emp_country, emp_esi_no, emp_cost_per_day, emp_status, emp_uname, emp_pass) VALUES (:emp_name, :emp_gender, :emp_dob, :emp_age, :emp_ph_no, :emp_aadhar, :emp_pan, :emp_mail, :emp_state, :emp_district, :emp_country, :emp_esi_no, :emp_cost_per_day, 'active', :emp_uname, :emp_pass)";

    // Prepare and execute the statement
    $stmt = $conn->prepare($insertQuery);
    $stmt->bindParam(':emp_name', $emp_name);
    $stmt->bindParam(':emp_gender', $emp_gender);
    $stmt->bindParam(':emp_dob', $emp_dob);
    $stmt->bindParam(':emp_age', $emp_age);
    $stmt->bindParam(':emp_ph_no', $emp_ph_no);
    $stmt->bindParam(':emp_aadhar', $emp_aadhar);
    $stmt->bindParam(':emp_pan', $emp_pan);
    $stmt->bindParam(':emp_mail', $emp_mail);
    $stmt->bindParam(':emp_state', $emp_state);
    $stmt->bindParam(':emp_district', $emp_district);
    $stmt->bindParam(':emp_country', $emp_country);
    $stmt->bindParam(':emp_esi_no', $emp_esi_no);
    $stmt->bindParam(':emp_cost_per_day', $emp_cost_per_day);
    $stmt->bindParam(':emp_uname', $emp_uname);
    $stmt->bindParam(':emp_pass', $emp_pass);

    // Execute the statement
    $stmt->execute();

    // Get the last insert ID
    // $lastInsertId = $con->lastInsertId();
    // $a_type='emp';
    // $insertQuery = "INSERT INTO m_admin (a_name, a_uname, a_pass,a_type,a_img,a_uid)
    //                 VALUES ( :a_name, :a_uname, :a_pass,:a_type,:a_img,:a_uid)";

    // // Prepare and execute the statement
    // $stmt = $con->prepare($insertQuery);
    // $stmt->bindParam(':a_name', $emp_name);
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
window.location.replace("view_employee.php?msgout=1");
</script>