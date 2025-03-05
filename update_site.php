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
        $cmp_name = isset($_POST['cmp_name']) ? $_POST['cmp_name'] : '';
        $cmp_ph = isset($_POST['cmp_ph']) ? $_POST['cmp_ph'] : '';
        $cmp_email = isset($_POST['cmp_email']) ? $_POST['cmp_email'] : '';
        $cmp_gst = isset($_POST['cmp_gst']) ? $_POST['cmp_gst'] : '';
        $cmp_add = isset($_POST['cmp_add']) ? $_POST['cmp_add'] : '';
        $cnt_name = isset($_POST['cnt_name']) ? $_POST['cnt_name'] : '';
        $cnt_ph = isset($_POST['cnt_ph']) ? $_POST['cnt_ph'] : '';
        $cnt_email = isset($_POST['cnt_email']) ? $_POST['cnt_email'] : '';
        $cmp_site = isset($_POST['cmp_site']) ? $_POST['cmp_site'] : '';
        $cmp_estd_bdt = isset($_POST['cmp_estd_bdt']) ? $_POST['cmp_estd_bdt'] : '';

        // Update query
        $sql = "UPDATE m_site SET cmp_name='$cmp_name', cmp_ph='$cmp_ph', cmp_email='$cmp_email', cmp_gst='$cmp_gst', cmp_add='$cmp_add', cnt_name='$cnt_name', cnt_ph='$cnt_ph', cnt_email='$cnt_email', cmp_site='$cmp_site', cmp_estd_bdt='$cmp_estd_bdt' WHERE cmp_id='$cmp_id'";
        
        // Execute SQL query
        $con->exec($sql);

        // Redirect after update
        echo "<script type='text/javascript'>window.location.replace('view_site.php?msgout=1');</script>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>