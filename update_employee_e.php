<?php
include 'asap.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emp_management";

try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $emp_status='active';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $emp_name = isset($_POST['emp_name']) ? $_POST['emp_name'] : '';
        $emp_gender = isset($_POST['emp_gender']) ? $_POST['emp_gender'] : '';
        $emp_dob = isset($_POST['emp_dob']) ? $_POST['emp_dob'] : '';
        $emp_age = isset($_POST['emp_age']) ? $_POST['emp_age'] : '';
        $emp_ph_no = isset($_POST['emp_ph_no']) ? $_POST['emp_ph_no'] : '';
        $emp_aadhar = isset($_POST['emp_aadhar']) ? $_POST['emp_aadhar'] : '';
        $emp_pan = isset($_POST['emp_pan']) ? $_POST['emp_pan'] : '';
        $emp_mail = isset($_POST['emp_mail']) ? $_POST['emp_mail'] : '';
        $emp_state = isset($_POST['emp_state']) ? $_POST['emp_state'] : '';
        $emp_district = isset($_POST['emp_district']) ? $_POST['emp_district'] : '';
        $emp_country = isset($_POST['emp_country']) ? $_POST['emp_country'] : '';
        $emp_esi_no = isset($_POST['emp_esi_no']) ? $_POST['emp_esi_no'] : '';
        $emp_cost_per_day = isset($_POST['emp_cost_per_day']) ? $_POST['emp_cost_per_day'] : '';
        $emp_uname = isset($_POST['emp_uname']) ? $_POST['emp_uname'] : '';
        $emp_pass = isset($_POST['emp_pass']) ? $_POST['emp_pass'] : '';
        $emp_id = isset($_POST['emp_id']) ? $_POST['emp_id'] : '';

        // Update query
        $sql = "UPDATE m_employee SET emp_name='$emp_name', emp_gender='$emp_gender', emp_dob='$emp_dob', emp_age='$emp_age', emp_ph_no='$emp_ph_no', emp_aadhar='$emp_aadhar', emp_pan='$emp_pan', emp_mail='$emp_mail', emp_state='$emp_state', emp_district='$emp_district', emp_country='$emp_country', emp_esi_no='$emp_esi_no', emp_cost_per_day='$emp_cost_per_day', emp_uname='$emp_uname', emp_pass='$emp_pass' WHERE emp_id='$emp_id'";
        
        // Execute SQL query
        $con->exec($sql);

        // Redirect after update
        echo "<script type='text/javascript'>window.location.replace('view_employee.php?msgout=1');</script>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>