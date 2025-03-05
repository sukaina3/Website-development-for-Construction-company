<?php
include 'asap.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo $cmp_name=$_POST['cmp_name'];
    $cmp_ph=$_POST['cmp_ph'];
    $cmp_email=$_POST['cmp_email'];
    $cmp_gst=$_POST['cmp_gst'];
    $cmp_add=$_POST['cmp_add'];
    $cnt_name=$_POST['cnt_name'];
    $cnt_ph=$_POST['cnt_ph'];
    $cnt_email=$_POST['cnt_email'];
    $cmp_site=$_POST['cmp_site'];
    $cmp_estd_bdt=$_POST['cmp_estd_bdt'];
    //$cmp_status=$_POST['cmp_status'];
    
    echo $insertQuery = "INSERT INTO m_site (cmp_name, cmp_ph, cmp_email, cmp_gst, cmp_add, cnt_name, cnt_ph, cnt_email, cmp_site, cmp_estd_bdt, cmp_status) VALUES (:cmp_name, :cmp_ph, :cmp_email, :cmp_gst, :cmp_add, :cnt_name, :cnt_ph, :cnt_email, :cmp_site, :cmp_estd_bdt, 'active')";

    // Prepare and execute the statement
    $stmt = $conn->prepare($insertQuery);
    $stmt->bindParam(':cmp_name', $cmp_name);
    $stmt->bindParam(':cmp_ph', $cmp_ph);
    $stmt->bindParam(':cmp_email', $cmp_email);
    $stmt->bindParam(':cmp_gst', $cmp_gst);
    $stmt->bindParam(':cmp_add', $cmp_add);
    $stmt->bindParam(':cnt_name', $cnt_name);
    $stmt->bindParam(':cnt_ph', $cnt_ph);
    $stmt->bindParam(':cnt_email', $cnt_email);
    $stmt->bindParam(':cmp_site', $cmp_site);
    $stmt->bindParam(':cmp_estd_bdt', $cmp_estd_bdt);
    //$stmt->bindParam(':cmp_status', $cmp_status);

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
window.location.replace("view_site.php?msgout=1");
</script>