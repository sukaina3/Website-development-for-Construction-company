<?php
include 'asap.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];
    $cmp_id = $_POST['cmp_id'];
    $att_date = $_POST['att_date'];
    $att_checkout = $_POST['att_checkout'];
    $att_pay = $_POST['att_pay'];
    


    $stmt = $conn->prepare("SELECT emp_name FROM m_attendance WHERE emp_id = :emp_id and cmp_id=:cmp_id");
$stmt->execute(['emp_id' => $emp_id, 'cmp_id' => $cmp_id]);
$row = $stmt->fetch();

    $check_att_date = $row['att_date'];

    if($check_att_date==''){
    $sql = "INSERT INTO m_attendance (emp_id, emp_name, cmp_id, cmp_name, att_date, att_checkout, att_pay, att_status)
            SELECT emp_id, emp_name, cmp_id, cmp_name, :att_date, :att_checkout, :att_pay, 'Ongoing' FROM m_assign WHERE emp_id = :emp_id AND cmp_id = :cmp_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':emp_id', $emp_id);
    $stmt->bindParam(':cmp_id', $cmp_id);
    $stmt->bindParam(':att_date', $att_date);
    $stmt->bindParam(':att_checkout', $att_checkout);
    $stmt->bindParam(':att_pay', $att_pay);
    

    try {
        $stmt->execute();
        header("Location: view_attendance.php?cmp_id=$cmp_id");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}else{
    ?>
    <script>
        window.alert('Provide the valid date');
        window.location.replace("view_attendance.php?cmp_id=<?php echo $cmp_id; ?>");
    </script>
    <?php
    }
}
?>