<?php
include('asap.php');   
$email =$_POST['t1'];
$Password =$_POST['t2'];
$stmt = $conn->prepare("select * from m_admin where a_uname = :email and a_pass=:pass and a_status='active'");
$stmt->execute(['email' => $email , 'pass' => $Password ]); 
$row = $stmt->fetch();
$a_name = $row['a_name'];
$a_type = $row['a_type'];
 

if($a_type ==NULL)
{

?>
<script>
window.alert('Incorrect Username/Password');
 window.location = 'index.php';

</script>
<?php
}
elseif($a_type=='admin') 
{
	session_start();
 
echo $_SESSION['a_img']= $row['a_img'];
echo $_SESSION['a_id']= $row['a_id'];
echo $_SESSION['a_uname']= $row['a_uname'];
echo $_SESSION['a_name']= $row['a_name'];
echo $_SESSION['a_type']= $row['a_type'];

header("Location:home.php");
exit;
}
elseif($a_type=='emp') 
{
    
$stmt22 = $conn->prepare("select * from m_employee where emp_uname = :emp_uname  ");
$stmt22->execute(['emp_uname' => $row['a_uname'] ]); 
$row22 = $stmt22->fetch();
$emp_department = $row22['emp_department'];
$emp_id = $row22['emp_id'];
$a_uid = $row22['emp_oid'];
	session_start();
 
echo $_SESSION['emp_id']= $emp_id;
echo $_SESSION['emp_department']= $emp_department;
echo $_SESSION['a_img']= $row['a_img'];
echo $_SESSION['a_id']= $row['a_id'];
echo $_SESSION['a_uname']= $row['a_uname'];
echo $_SESSION['a_name']= $row['a_name'];
echo $_SESSION['a_type']= $row['a_type'];
echo $_SESSION['a_uid']= $a_uid;

header("Location:view_call.php");
exit;
}elseif($a_type!='adjkjkmin') 
{
	session_start();
 
echo $_SESSION['a_id']= $row['a_id'];
echo $_SESSION['a_uname']= $row['a_uname'];
echo $_SESSION['a_name']= $row['a_name'];
echo $_SESSION['a_type']= $row['a_type'];
echo $_SESSION['a_img']= $row['a_img'];

header("Location:home.php");
exit;
}
elseif($type1=='user') 
{
	session_start();
 
echo $_SESSION['a_id']= $row['a_id'];
echo $_SESSION['a_uname']= $row['a_uname'];
echo $_SESSION['a_name']= $row['a_name'];
echo $_SESSION['a_type']= $row['a_type'];

header("Location:home_user.php");
exit;
}
?>
