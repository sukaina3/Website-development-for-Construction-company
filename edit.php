<?php
include "asap.php";
$emp_id = $_GET["emp_id"];

if (isset($_POST["submit"])) {
  $emp_oid = $_POST['emp_oid'];
  $emp_name = $_POST['emp_name'];
  $emp_dob = $_POST['emp_dob'];
  $emp_age = $_POST['emp_age'];
  $emp_ph_no = $_POST['emp_ph_no'];
  $emp_aadhar = $_POST['emp_aadhar'];
  $emp_pan = $_POST['emp_pan'];
  $emp_mail = $_POST['emp_mail'];
  $emp_state = $_POST['emp_state'];
  $emp_district = $_POST['emp_district'];
  $emp_country = $_POST['emp_country'];
  $emp_dept = $_POST['emp_dept'];
  $emp_uname = $_POST['emp_uname'];
  $emp_pass = $_POST['emp_pass'];

  $sql = "UPDATE `m_employee` SET `emp_oid`='$emp_oid',`emp_name`='$emp_name',`emp_dob`='$emp_dob',`emp_age`='$emp_age', `emp_ph_no`='$emp_ph_no',`emp_aadhar`='$emp_aadhar',`emp_pan`='$emp_pan',`emp_mail`='$emp_mail', `emp_state`='$emp_state',`emp_district`='$emp_district',`emp_country`='$emp_country',`emp_dept`='$emp_dept', `emp_uname`='$emp_uname',`emp_pass`='$emp_pass', WHERE emp_id = $emp_id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP Complete CRUD Application
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `m_employee` WHERE emp_id = $emp_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Employee ID:</label>
            <input type="number" class="form-control" name="emp_oid" value="<?php echo $row['emp_oid'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="emp_name" value="<?php echo $row['emp_name'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Date of Birth:</label>
          <input type="date" class="form-control" name="emp_dob" value="<?php echo $row['emp_dob'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Age:</label>
          <input type="number" class="form-control" name="emp_age" value="<?php echo $row['emp_age'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Phone:</label>
          <input type="text" class="form-control" name="emp_ph_no" value="<?php echo $row['emp_ph_no'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Aadhar:</label>
          <input type="text" class="form-control" name="emp_aadhar" value="<?php echo $row['emp_aadhar'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Pancard:</label>
          <input type="text" class="form-control" name="emp_pan" value="<?php echo $row['emp_pan'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="emp_mail" value="<?php echo $row['emp_mail'] ?>">
        </div>

        <div class="row">
          <label>State</label>
          <select name="emp_state">
                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                          <option value="Assam">Assam</option>
                          <option value="Bihar">Bihar</option>
                          <option value="Chhattisgarh">Chhattisgarh</option>
                          <option value="Goa">Goa</option>
                          <option value="Gujarat">Gujarat</option>
                          <option value="Haryana">Haryana</option>
                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                          <option value="Jharkhand">Jharkhand</option>
                          <option value="Karnataka">Karnataka</option>
                          <option value="Kerala">Kerala</option>
                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                          <option value="Maharashtra">Maharashtra</option>
                          <option value="Manipur">Manipur</option>
                          <option value="Meghalaya">Meghalaya</option>
                          <option value="Mizoram">Mizoram</option>
                          <option value="Nagaland">Nagaland</option>
                          <option value="Odisha">Odisha</option>
                          <option value="Punjab">Punjab</option>
                          <option value="Rajasthan">Rajasthan</option>
                          <option value="Sikkim">Sikkim</option>
                          <option value="Tamil Nadu">Tamil Nadu</option>
                          <option value="Telangana">Telangana</option>
                          <option value="Tripura">Tripura</option>
                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                          <option value="Uttarakhand">Uttarakhand</option>
                          <option value="West Bengal">West Bengal</option>
                        </select>
                      </div>
        
        <div class="mb-3">
          <label class="form-label">District:</label>
          <input type="text" class="form-control" name="emp_district" value="<?php echo $row['emp_district'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Country:</label>
          <input type="text" class="form-control" name="emp_country" value="<?php echo $row['emp_country'] ?>">
        </div>

        <div class="row">
          <label>Department</label>
          <select name="emp_dept">
            <option value="Sales">Sales</option>
            <option value="Finance">Finance</option>
            <option value="Marketing">Marketing</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Username:</label>
          <input type="text" class="form-control" name="emp_uname" value="<?php echo $row['emp_uname'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Password:</label>
          <input type="text" class="form-control" name="emp_pass" value="<?php echo $row['emp_pass'] ?>">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>