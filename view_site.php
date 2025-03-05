
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
    <i class="fa fa-plus"></i> &nbsp;Add Site
  </button> 
</div>

        <!-- Add New Address Modal -->
              <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Site Details</h3>
                   <form class="card-body" method="post" action="add_site.php" enctype="multipart/form-data">
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Company Name</label>
                        <input required type="text" class="form-control" name="cmp_name" id="cmp_name" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Phone Number</label>
                        <input required type="text" class="form-control" name="cmp_ph" id="cmp_ph" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Company Mail</label>
                        <input required type="email" class="form-control" name="cmp_email" id="cmp_email" oninput="updateUsername()"/>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">GST</label>
                        <input required type="text" class="form-control" name="cmp_gst" id="cmp_gst" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Type of Work</label>
                        <input required type="text" class="form-control" name="cmp_add" id="cmp_add" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Contact Name</label>
                        <input required type="text" class="form-control" name="cnt_name" id="cnt_name" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Phone Number</label>
                        <input required type="text" class="form-control" name="cnt_ph" id="cnt_ph" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Contact Email</label>
                        <input required type="email" class="form-control" name="cnt_email" id="cnt_email" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Site Location</label>
                        <input required type="text" class="form-control" name="cmp_site" id="cmp_site" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Estimated Budget</label>
                        <input required type="text" class="form-control" name="cmp_estd_bdt" id="cmp_estd_bdt" />
                      </div>
                      <div class="col-md-12"><br>
                      <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                      </div>
                    </div>
                  </form>
          

<!-- <script>
    function updateUsername() {
        var email = document.getElementById("emp_mail").value;
        var usernameField = document.getElementById("emp_uname");
        // Extract username from email (before @)
        var username = email;
        usernameField.value = username;
    }
</script> -->
              

 
 


                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!--/ Add New Address Modal -->


<?php
$query = "SELECT COUNT(cmp_id) AS active_company_count FROM m_site WHERE cmp_status = 'active' ";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$active_employee_count = $result['active_company_count'];
?>

<?php
$query = "SELECT COUNT(cmp_id) AS inactive_company_count FROM m_site WHERE cmp_status = 'inactive' ";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$inactive_employee_count = $result['inactive_company_count'];
?>


            <div class="container-xxl flex-grow-1 container-p-y"  style="padding-bottom: 0px !important; padding-top: 0px !important;">
  <div class="row">
    <div class="card" style="padding: 0px;">
        
        
        
        <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
        <li class="nav-item" role="presentation">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true"> Active Details <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-success ms-1"><?php echo $active_employee_count; ?></span></button>
        </li>
        <li class="nav-item" role="presentation">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false" tabindex="-1"> Inactive Details <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1"><?php echo $inactive_employee_count; ?></span></button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
        <div class="table-responsive">
          <table class="table">
    <thead>
        <tr>
            <th>Company Name</th>
            <th>Phone Number</th>
            <th>Company Mail</th>
            <th>GST</th>
            <th>Type of Work</th>
            <th>Contact Name</th>
            <th>Phone Number</th>
            <th>Contact Email</th>
            <th>Site Location</th>
            <th>Estimated Budget</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $query = "SELECT * FROM m_site where cmp_status='active' order by cmp_id";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo '

            <!-- Add New Address Modal -->
              <div class="modal fade" id="edit'.$row['cmp_id'].'" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Update Site Details</h3>
                   <form class="card-body" method="post" action="update_site.php" enctype="multipart/form-data">
                   <input type="hidden" name="cmp_id" id="cmp_id" value="'.$row['cmp_id'].'">
    <div class="row g-3">
    <div class="col-md-4">
    <label class="form-label" for="multicol-username">Company Name</label>
    <input required type="text" class="form-control" name="cmp_name" id="cmp_name" value="'.$row['cmp_name'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Phone Number</label>
    <input required type="text" class="form-control" name="cmp_ph" id="cmp_ph" value="'.$row['cmp_ph'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Company Mail</label>
    <input required type="email" class="form-control" name="cmp_email" id="cmp_email" oninput="updateUsername()" value="'.$row['cmp_email'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">GST</label>
    <input required type="text" class="form-control" name="cmp_gst" id="cmp_gst" value="'.$row['cmp_gst'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Type of Work</label>
    <input required type="text" class="form-control" name="cmp_add" id="cmp_add" value="'.$row['cmp_add'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Contact Name</label>
    <input required type="text" class="form-control" name="cnt_name" id="cnt_name" value="'.$row['cnt_name'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Phone Number</label>
    <input required type="text" class="form-control" name="cnt_ph" id="cnt_ph" value="'.$row['cnt_ph'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Contact Email</label>
    <input required type="email" class="form-control" name="cnt_email" id="cnt_email" value="'.$row['cnt_email'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Site Location</label>
    <input required type="text" class="form-control" name="cmp_site" id="cmp_site" value="'.$row['cmp_site'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Estimated Budget</label>
    <input required type="text" class="form-control" name="cmp_estd_bdt" id="cmp_estd_bdt" value="'.$row['cmp_estd_bdt'].'"/>
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
              <div class="modal fade" id="profile'.$row['cmp_id'].'" tabindex="-1" aria-hidden="true">
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
                <td>' . $row['cmp_name'] . '</td>
                <td>' . $row['cmp_ph'] . '</td>
                <td>' . $row['cmp_email'] . '</td>
                <td>' . $row['cmp_gst'] . '</td>
                <td>' . $row['cmp_add'] . '</td>
                <td>' . $row['cnt_name'] . '</td>
                <td>' . $row['cnt_ph'] . '</td>
                <td>' . $row['cnt_email'] . '</td>
                <td>' . $row['cmp_site'] . '</td>
                <td>' . $row['cmp_estd_bdt'] . '</td>
                <td>
        <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="employeeList">
          <a class="dropdown-item text-warning" data-bs-toggle="modal"data-bs-target="#edit'.$row['cmp_id'].'" >Edit</a>
            <a class="dropdown-item text-danger" href="inactive_company.php?cmp_id='.$row['cmp_id'].'">Inactive</a>
            <a class="dropdown-item text-danger" href="view_assign.php?cmp_id='.$row['cmp_id'].'">Assign</a>
            <a class="dropdown-item text-success" href="view_attendance.php?cmp_id='.$row['cmp_id'].'">Attendance</a>
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
            <th>Company Name</th>
            <th>Phone Number</th>
            <th>Company Mail</th>
            <th>GST</th>
            <th>Type of Work</th>
            <th>Contact Name</th>
            <th>Phone Number</th>
            <th>Contact Email</th>
            <th>Site Location</th>
            <th>Estimated Budget</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
    <?php
        $query = "SELECT * FROM m_site where cmp_status='inactive'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo '

            <!-- Add New Address Modal -->
              <div class="modal fade" id="edit'.$row['cmp_id'].'" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Update Site Details</h3>
                   <form class="card-body" method="post" action="update_site.php" enctype="multipart/form-data">
                   <input type="hidden" name="cmp_id" id="cmp_id" value="'.$row['cmp_id'].'">
    <div class="row g-3">
    <div class="col-md-4">
    <label class="form-label" for="multicol-username">Company Name</label>
    <input required type="text" class="form-control" name="cmp_name" id="cmp_name" value="'.$row['cmp_name'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Phone Number</label>
    <input required type="text" class="form-control" name="cmp_ph" id="cmp_ph" value="'.$row['cmp_ph'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Company Mail</label>
    <input required type="email" class="form-control" name="cmp_email" id="cmp_email" oninput="updateUsername()" value="'.$row['cmp_email'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">GST</label>
    <input required type="text" class="form-control" name="cmp_gst" id="cmp_gst" value="'.$row['cmp_gst'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Type of Work</label>
    <input required type="text" class="form-control" name="cmp_add" id="cmp_add" value="'.$row['cmp_add'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Contact Name</label>
    <input required type="text" class="form-control" name="cnt_name" id="cnt_name" value="'.$row['cnt_name'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Phone Number</label>
    <input required type="text" class="form-control" name="cnt_ph" id="cnt_ph" value="'.$row['cnt_ph'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Contact Email</label>
    <input required type="email" class="form-control" name="cnt_email" id="cnt_email" value="'.$row['cnt_email'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Site Location</label>
    <input required type="text" class="form-control" name="cmp_site" id="cmp_site" value="'.$row['cmp_site'].'"/>
  </div>
  <div class="col-md-4">
    <label class="form-label" for="multicol-username">Estimated Budget</label>
    <input required type="text" class="form-control" name="cmp_estd_bdt" id="cmp_estd_bdt" value="'.$row['cmp_estd_bdt'].'"/>
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
              <div class="modal fade" id="profile'.$row['cmp_id'].'" tabindex="-1" aria-hidden="true">
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
                <td>' . $row['cmp_name'] . '</td>
                <td>' . $row['cmp_ph'] . '</td>
                <td>' . $row['cmp_email'] . '</td>
                <td>' . $row['cmp_gst'] . '</td>
                <td>' . $row['cmp_add'] . '</td>
                <td>' . $row['cnt_name'] . '</td>
                <td>' . $row['cnt_ph'] . '</td>
                <td>' . $row['cnt_email'] . '</td>
                <td>' . $row['cmp_site'] . '</td>
                <td>' . $row['cmp_estd_bdt'] . '</td>
                <td>
        <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="detailList">
          <a class="dropdown-item text-warning" data-bs-toggle="modal"data-bs-target="#edit'.$row['cmp_id'].'" >Edit</a>
            <a class="dropdown-item text-success" href="active_company.php?cmp_id='.$row['cmp_id'].'">Active</a>
            <a class="dropdown-item text-success" href="view_assign.php?cmp_id='.$row['cmp_id'].'">Assign</a>
            <a class="dropdown-item text-success" href="view_attendance.php?cmp_id='.$row['cmp_id'].'">Attendance</a>
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
