
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
<?php
date_default_timezone_set("Asia/Calcutta");
if($a_type=='admin'){
  include 'leftbar_admin.php';
}
if($a_type=='emp'){
  include 'leftbar_employee.php';
}
if($a_type=='hotel'){
  include 'leftbar_hotel.php';
}
?>
