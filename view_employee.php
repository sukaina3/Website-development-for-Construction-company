
         <?php
              include 'header.php';
              include 'toolbar.php';
          ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

           <?php
              include 'topbar.php';
          ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->









<div style="text-align: right; margin:15px;">
   <button type="button" class="btn btn-primary"  data-bs-toggle="modal"data-bs-target="#addNewAddress">
    <i class="fa fa-plus"></i> &nbsp;Add Employee
  </button> 
</div>

        <!-- Add New Address Modal -->
              <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Employee Details</h3>
                   <form class="card-body" method="post" action="add_employee_e[1].php" enctype="multipart/form-data">
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Name</label>
                        <input required type="text" class="form-control" name="emp_name" id="emp_name" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Gender</label>
                        <select name="emp_gender" class="form-select">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Others">Others</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Date of Birth</label>
                        <input required type="date" class="form-control" name="emp_dob" id="emp_dob" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Age</label>
                        <input required type="number" class="form-control" name="emp_age" id="emp_age" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Phone</label>
                        <input required type="text" class="form-control" name="emp_ph_no" id="emp_ph_no" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Aadhar</label>
                        <input required type="text" class="form-control" name="emp_aadhar" id="emp_aadhar" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">PAN</label>
                        <input required type="text" class="form-control" name="emp_pan" id="emp_pan" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Email</label>
                        <input required type="email" class="form-control" name="emp_mail" id="emp_mail" oninput="updateUsername()"/>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">State</label>
                        <select name="emp_state" class="form-select">
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
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">District</label>
                        <input required type="text" class="form-control" name="emp_district" id="emp_district" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Country</label>
                        <input required type="text" class="form-control" name="emp_country" id="emp_country" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">ESI Number</label>
                        <input required type="text" class="form-control" name="emp_esi_no" id="emp_esi_no" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Cost per Day</label>
                        <input required type="number" class="form-control" name="emp_cost_per_day" id="emp_cost_per_day" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Username</label>
                        <input type="text"  class="form-control" name="emp_uname" id="emp_uname" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Password</label>
                        <input required type="text" class="form-control" name="emp_pass" id="emp_pass" />
                      </div>
                      <div class="col-md-12"><br>
                      <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                      </div>
                    </div>
                  </form>
          

<script>
    function updateUsername() {
        var email = document.getElementById("emp_mail").value;
        var usernameField = document.getElementById("emp_uname");
        // Extract username from email (before @)
        var username = email;
        usernameField.value = username;
    }
</script>
              

 
 


                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!--/ Add New Address Modal -->


<?php
$query = "SELECT COUNT(emp_id) AS active_employee_count FROM m_employee WHERE emp_status = 'active' ";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$active_employee_count = $result['active_employee_count'];
?>

<?php
$query = "SELECT COUNT(emp_id) AS inactive_employee_count FROM m_employee WHERE emp_status = 'inactive' ";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$inactive_employee_count = $result['inactive_employee_count'];
?>


            <div class="container-xxl flex-grow-1 container-p-y"  style="padding-bottom: 0px !important; padding-top: 0px !important;">
  <div class="row">
    <div class="card" style="padding: 0px;">
        
        
        
        <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
        <li class="nav-item" role="presentation">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true"> Active Employees <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-success ms-1"><?php echo $active_employee_count; ?></span></button>
        </li>
        <li class="nav-item" role="presentation">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false" tabindex="-1"> Inactive Employees <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1"><?php echo $inactive_employee_count; ?></span></button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
        <div class="table-responsive">
          <table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Aadhar</th>
            <th>Pancard</th>
            <th>Email</th>
            <th>State</th>
            <th>District</th>
            <th>Country</th>
            <th>ESI Number</th>
            <th>Cost per Day</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM m_employee where emp_status='active' order by emp_id desc";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo '
            
        <!-- Add New Address Modal -->
              <div class="modal fade" id="edit'.$row['emp_id'].'" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Update Employee Details</h3>
                   <form class="card-body" method="post" action="update_employee_e.php" enctype="multipart/form-data">
                   <input type="hidden" name="emp_id" id="emp_id" value="'.$row['emp_id'].'">
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Name</label>
            <input required type="text" class="form-control" name="emp_name" id="emp_name" value="'.$row['emp_name'].'" />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Gender</label>
            <select name="emp_gender" class="form-select" value="'.$row['emp_gender'].'">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Date of Birth</label>
            <input required type="date" class="form-control" name="emp_dob" id="emp_dob" value="'.$row['emp_dob'].'" />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Age</label>
            <input required type="number" class="form-control" name="emp_age" id="emp_age" value="'.$row['emp_age'].'" />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Phone</label>
            <input required type="text" class="form-control" name="emp_ph_no" id="emp_ph_no" value="'.$row['emp_ph_no'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Aadhar</label>
            <input required type="text" class="form-control" name="emp_aadhar" id="emp_aadhar" value="'.$row['emp_aadhar'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Pancard</label>
            <input required type="text" class="form-control" name="emp_pan" id="emp_pan" value="'.$row['emp_pan'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Email</label>
            <input type="email" class="form-control" name="emp_mail" id="emp_mail" oninput="updateUsername()" value="'.$row['emp_mail'].'"/>
        </div>
        <div class="col-md-4">
                        <label class="form-label" for="multicol-username">State</label>
                        <select name="emp_state" class="form-select">
                        <option value="">'.$row['emp_state'].'</option>
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
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">District</label>
            <input required type="text" class="form-control" name="emp_district" id="emp_district" value="'.$row['emp_district'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Country</label>
            <input required type="text" class="form-control" name="emp_country" id="emp_country" value="'.$row['emp_country'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">ESI Number</label>
            <input required type="text" class="form-control" name="emp_esi_no" id="emp_esi_no" value="'.$row['emp_esi_no'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Cost per Day</label>
            <input required type="number" class="form-control" name="emp_cost_per_day" id="emp_cost_per_day" value="'.$row['emp_cost_per_day'].'"/>
        </div>
        
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Username</label>
            <input type="text"  class="form-control" name="emp_uname" id="emp_uname" value="'.$row['emp_uname'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Password</label>
            <input required type="text" class="form-control" name="emp_pass" id="emp_pass"  value="'.$row['emp_pass'].'"/>
        </div>
        <div class="col-md-12"><br>
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
        </div>
    </div>
</form>


 
 


                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!--/ Add New Address Modal -->


  <!-- Add New Address Modal -->
              <div class="modal fade" id="profile'.$row['emp_id'].'" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                       
                


 
 


                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!--/ Add New Address Modal -->

            <tr>
                <td>' . $row['emp_name'] . '</td>
                <td>' . $row['emp_gender'] . '</td>
                <td>' . $row['emp_dob'] . '</td>
                <td>' . $row['emp_age'] . '</td>
                <td>' . $row['emp_ph_no'] . '</td>
                <td>' . $row['emp_aadhar'] . '</td>
                <td>' . $row['emp_pan'] . '</td>
                <td>' . $row['emp_mail'] . '</td>
                <td>' . $row['emp_state'] . '</td>
                <td>' . $row['emp_district'] . '</td>
                <td>' . $row['emp_country'] . '</td>
                <td>' . $row['emp_esi_no'] . '</td>
                <td>' . $row['emp_cost_per_day'] . '</td>
                <td>' . $row['emp_uname'] . '</td>
                <td>' . $row['emp_pass'] . '</td>
                <td>
                <div class="dropdown">
          <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="employeeList">
            <a class="dropdown-item text-warning" data-bs-toggle="modal"data-bs-target="#edit'.$row['emp_id'].'" >Edit</a>
            <a class="dropdown-item text-danger" href="inactive_employee.php?emp_id='.$row['emp_id'].'">Inactive</a>
            <a class="dropdown-item text-danger" href="delete_employee.php?emp_id='.$row['emp_id'].'">Delete</a>
          </div>
        </div></td>
            </tr>';
        }
        ?>
    </tbody>
</table>
        </div>
      </div>
        <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
        <div class="table-responsive">
          <table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Aadhar</th>
            <th>Pancard</th>
            <th>Email</th>
            <th>State</th>
            <th>District</th>
            <th>Country</th>
            <th>ESI Number</th>
            <th>Cost per Day</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM m_employee where emp_status='inactive'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo '
            
        <!-- Add New Address Modal -->
              <div class="modal fade" id="edit'.$row['emp_id'].'" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Update Employee Details</h3>
                   <form class="card-body" method="post" action="update_employee_e.php" enctype="multipart/form-data">
                   <input type="hidden" name="emp_id" id="emp_id" value="'.$row['emp_id'].'">
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Name</label>
            <input required type="text" class="form-control" name="emp_name" id="emp_name" value="'.$row['emp_name'].'" />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Gender</label>
            <select name="emp_gender" class="form-select" value="'.$row['emp_gender'].'">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Date of Birth</label>
            <input required type="date" class="form-control" name="emp_dob" id="emp_dob" value="'.$row['emp_dob'].'" />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Age</label>
            <input required type="number" class="form-control" name="emp_age" id="emp_age" value="'.$row['emp_age'].'" />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Phone</label>
            <input required type="text" class="form-control" name="emp_ph_no" id="emp_ph_no" value="'.$row['emp_ph_no'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Aadhar</label>
            <input required type="text" class="form-control" name="emp_aadhar" id="emp_aadhar" value="'.$row['emp_aadhar'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Pancard</label>
            <input required type="text" class="form-control" name="emp_pan" id="emp_pan" value="'.$row['emp_pan'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Email</label>
            <input type="email" class="form-control" name="emp_mail" id="emp_mail" oninput="updateUsername()" value="'.$row['emp_mail'].'"/>
        </div>
        <div class="col-md-4">
                        <label class="form-label" for="multicol-username">State</label>
                        <select name="emp_state" class="form-select">
                        <option value="">'.$row['emp_state'].'</option>
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
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">District</label>
            <input required type="text" class="form-control" name="emp_district" id="emp_district" value="'.$row['emp_district'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Country</label>
            <input required type="text" class="form-control" name="emp_country" id="emp_country" value="'.$row['emp_country'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">ESI Number</label>
            <input required type="text" class="form-control" name="emp_esi_no" id="emp_esi_no" value="'.$row['emp_esi_no'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Cost per Day</label>
            <input required type="number" class="form-control" name="emp_cost_per_day" id="emp_cost_per_day" value="'.$row['emp_cost_per_day'].'"/>
        </div>
        
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Username</label>
            <input type="text"  class="form-control" name="emp_uname" id="emp_uname" value="'.$row['emp_uname'].'"/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="multicol-username">Password</label>
            <input required type="text" class="form-control" name="emp_pass" id="emp_pass"  value="'.$row['emp_pass'].'"/>
        </div>
        <div class="col-md-12"><br>
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
        </div>
    </div>
</form>


 
 


                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!--/ Add New Address Modal -->

  <!-- Add New Address Modal -->
              <div class="modal fade" id="profile'.$row['emp_id'].'" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                       


 
 


                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!--/ Add New Address Modal -->


            <tr>
            <td>' . $row['emp_name'] . '</td>
            <td>' . $row['emp_gender'] . '</td>
            <td>' . $row['emp_dob'] . '</td>
            <td>' . $row['emp_age'] . '</td>
            <td>' . $row['emp_ph_no'] . '</td>
            <td>' . $row['emp_aadhar'] . '</td>
            <td>' . $row['emp_pan'] . '</td>
            <td>' . $row['emp_mail'] . '</td>
            <td>' . $row['emp_state'] . '</td>
            <td>' . $row['emp_district'] . '</td>
            <td>' . $row['emp_country'] . '</td>
            <td>' . $row['emp_esi_no'] . '</td>
            <td>' . $row['emp_cost_per_day'] . '</td>
            <td>' . $row['emp_uname'] . '</td>
            <td>' . $row['emp_pass'] . '</td>
                <td>
                <div class="dropdown">
          <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="employeeList">
            <a class="dropdown-item text-warning" data-bs-toggle="modal"data-bs-target="#edit'.$row['emp_id'].'" >Edit</a>
            <a class="dropdown-item text-success" href="active_employee.php?emp_id='.$row['emp_id'].'">Active</a>
            <a class="dropdown-item text-danger" href="delete_employee.php?emp_id='.$row['emp_id'].'">Delete</a>
          </div>
        </div></td>
            </tr>';
        }
        ?>
    </tbody>
</table>
        </div>
     
      </div>
    </div>
        
        
        
        
  
              </div>
              </div>
            </div>
      
            <!-- / Content -->

   
          <?php
              include 'footer.php';
          ?>
