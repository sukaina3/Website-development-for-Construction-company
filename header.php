<!DOCTYPE html>
 <?php
 include 'asap.php';
session_start();

@ $a_id = $_SESSION['a_id'];
@ $a_type = $_SESSION['a_type'];
@ $a_name = $_SESSION['a_name'];
@ $a_uname = $_SESSION['a_uname'];
@ $a_img = $_SESSION['a_img'];
@ $emp_dept = $_SESSION['emp_dept'];
@ $emp_id = $_SESSION['emp_id'];
@ $a_uid = $_SESSION['a_uid'];
@ $msgout=$_GET['msgout'];
  $a_img;

   ?>


<?php
if($a_type == NULL)
{
?>
<script type="text/javascript">
    window.alert('Access Denied');
    window.location='logout.php';
</script>
<?php
}
?>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Logs - Civil Project</title>

    <meta name="description" content="" />

    <!-- Favicon -->
<link rel="icon" href="https://theabduz.com/wp-content/uploads/2022/11/favicon.png" sizes="32x32" />
<link rel="icon" href="https://theabduz.com/wp-content/uploads/2022/11/favicon.png" sizes="192x192" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="assets/vendor/css/pages/cards-advance.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
     <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.popup{
  filter: drop-shadow(
      1px 2px 8px var(--shadow-color)
    );
  --shadow-color: hsl(224deg 38% 61%);
    background-color: #ffffff;
    width: 420px;
    padding: 8px 40px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    border-radius: 8px;
    font-family: "Poppins",sans-serif;
    display: none; 
    text-align: center;
}

.popup h2{
  margin-top: -20px;
}

.template-customizer-open-btn{
display:none !important;
}
.popup p{
    font-size: 14px;
    text-align: justify;
    margin: 20px 0;
    line-height: 25px;
}
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
.menu-icon-1{
  padding-right: 8px;
}
    </style>
  </head>
