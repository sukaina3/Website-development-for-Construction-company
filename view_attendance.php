<?php
include 'asap.php';
include 'header.php';
include 'toolbar.php';


$cmp_id = isset($_GET['cmp_id']) ? $_GET['cmp_id'] : null;


?>

<div class="layout-page">
    <?php include 'topbar.php'; ?>

    <div class="content-wrapper">
    <div style="text-align: right; margin:35px;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAttendanceModal">
        <i class="fa fa-user-plus menu-icon-1"></i> &nbsp;Add Attendance
    </button>
</div>
<div class="modal fade" id="addAttendanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
    <div class="modal-body">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                <h3 class="address-title mb-2"><i class="fas fa-user-tie"></i> Attendance Details</h3>
                <form method="POST" action="add_attendance.php">
                <div class="row g-3">
                <div class="col-sm-4">
                        <label class="form-label" for="employeeSelect">Select Employee</label>
                        <select class="form-control" id="employeeSelect" name="emp_id" required>
                            <?php
                            // Fetch assigned employees for the current company
                            $query = "SELECT emp_id, emp_name FROM m_assign WHERE cmp_id = :cmp_id";
                            $stmt = $conn->prepare($query);
                            $stmt->bindParam(':cmp_id', $cmp_id);
                            $stmt->execute();
                            $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($employees as $employee) {
                                echo '<option value="' . $employee['emp_id'] . '">' . $employee['emp_name'] . '</option>';
                                
                            }
                            ?>
                        </select>
                        </div>
                            <div class="col-md-4">
                                    <label class="form-label" for="att_date">Date</label>
                                    <input required type="date" class="form-control" name="att_date" id="att_date" />
                                </div>
                            <div class="col-sm-4">
                            <input type="hidden" name="cmp_id" value="<?php echo $cmp_id; ?>">
                    </div>
                </div>
                <div class="col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                        </div>
                        </div> 
                        

<?php
$query = "SELECT COUNT(att_id) AS ongoing_checkout FROM m_attendance WHERE att_status = 'ongoing' ";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$ongoing_checkout = $result['ongoing_checkout'];
?>

<?php
$query = "SELECT COUNT(att_id) AS completed_checkout FROM m_attendance WHERE att_status = 'completed' ";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$completed_checkout = $result['completed_checkout'];
?>

        <!-- Display Assigned Employees Table -->
        <div class="container-xxl flex-grow-1 container-p-y" >
        <div class="row">
        <div class="card" style="padding: 0px;">
        <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
        <li class="nav-item" role="presentation">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true"> Ongoing <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-success ms-1"><?php echo $ongoing_checkout; ?></span></button>
        </li>
        <li class="nav-item" role="presentation">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false" tabindex="-1"> History <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1"><?php echo $completed_checkout; ?></span></button>
        </li>
      </ul>

        <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
        <div class="table-responsive">
        <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Company ID</th>
                                            <th>Company Name</th>
                                            <th>Date</th>
                                            <th>Checkout</th>
                                            <th>Pay</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        </div>
                        </div>
                                        <?php
                                        // Fetch assigned employees and their corresponding companies
                                        $query = "SELECT * FROM m_attendance WHERE cmp_id = :cmp_id AND att_status='Ongoing' order by att_id desc"; // Filter by cmp_id
                                        $stmt = $conn->prepare($query);
                                        $stmt->bindParam(':cmp_id', $cmp_id);
                                        
                                        try {
                                            $stmt->execute();
                                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            foreach ($result as $row) {
                                                echo '
            
        
                                                    <!-- Modal for Checkout -->
                                                    <div class="modal fade" id="addcheckout' . $row['att_id'] . '" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-simple modal-add-new-checkout">
                                                            <div class="modal-content p-3 p-md-5">
                                                                <div class="modal-body">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    <div class="text-center mb-4">
                                                                        <h3 class="address-title mb-2">Add Check Out details</h3>
                                                                        <form class="card-body" method="post" action="checkout_attendance.php" enctype="multipart/form-data">
                                                                                <input type="hidden" name="att_id" id="att_id" value="'.$row['att_id'].'">
                                                                                <input type="hidden" name="cmp_id" id="cmp_id" value="'.$row['cmp_id'].'">
                                                                                <div class="row g-3">
                                                                                    <div class="col-md-4">
                                                                                    <label class="form-label" for="multicol-username">Check Out</label>
                                                                                                    <select name="att_checkout" class="form-select" value="'.$row['att_checkout'].'"> 
                                                                                                    <option value="Full day">Full day</option>
                                                                                                    <option value="Half-a-day">Half-a-day</option>
                                                                                                    <option value="Over Duty">Over Duty</option>
                                                                                                    </select>
                                                                                                  </div>

                                                                                    <div class="col-md-4">
                                                                                        <label class="form-label" for="multicol-username">Pay</label>
                                                                                        <input required type="number" class="form-control" name="att_pay" id="att_pay" value="'.$row['att_pay'].'"/>
                                                                                    </div>

                                                                                    <div class="col-sm-4">
                                                                                    <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
                                                                                        </div>
                                                                                    
                                                                                    <div class="col-md-12">
                                                                                                    <br>
                                                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                                                </div>
                                                                                                    </div>
                                                                                    </form>
                                                                                            </div>
                                                                                            </div>
                                                                                            </div>
                                                                                            </div>
                                                                                            </div>
                                                                                            

  
              <div class="modal fade" id="addcheckout'.$row['emp_id'].'" tabindex="-1" aria-hidden="true">
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
                                                    <tr>
                                                    <td>' . $row['emp_id'] . '</td>
                                                        <td>' . $row['emp_name'] . '</td>
                                                        <td>' . $row['cmp_id'] . '</td>
                                                        <td>' . $row['cmp_name'] . '</td>
                                                        <td>' . $row['att_date'] . '</td>
                                                        <td>' . $row['att_checkout'] . '</td>
                                                        <td>' . $row['att_pay'] . '</td> 
                                                        <td>
                                                        <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="detailList">
                                                        <a class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#addcheckout' . $row['att_id'] . '">Checkout</a>
                                                        <a class="dropdown-item text-danger" href="delete_attendance.php?emp_id='.$row['emp_id'].'&cmp_id='.$row['cmp_id'].'&att_date='.$row['att_date'].'&att_checkout='.$row['att_checkout'].'&att_pay='.$row['att_pay'].'">Delete</a>
                                                        </div>
                                                        </div></td>
                                                    </tr>';
                                            }
                                        } catch(PDOException $e) {
                                            echo "Error: " . $e->getMessage();
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
        <th>Employee ID</th>
        <th>Employee Name</th>
        <th>Company ID</th>
        <th>Company Name</th>
        <th>Date</th>
        <th>Checkout</th>
        <th>Pay</th>
        <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
                                    </div>
                                    </div>
        <?php
        $query = "SELECT * FROM m_attendance where cmp_id=$cmp_id and att_status='completed'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo '

            <!-- Modal for Checkout -->
                <div class="modal fade" id="addcheckout' . $row['att_id'] . '" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-simple modal-add-new-checkout">
                        <div class="modal-content p-3 p-md-5">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="text-center mb-4">
                                    <h3 class="address-title mb-2">Add Check Out details</h3>
                                    <form class="card-body" method="post" action="checkout_attendance.php" enctype="multipart/form-data">
                                            <input type="hidden" name="att_id" id="att_id" value="'.$row['att_id'].'">
                                            <input type="hidden" name="cmp_id" id="cmp_id" value="'.$row['cmp_id'].'">
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                <label class="form-label" for="multicol-username">Check Out</label>
                                                                <select name="att_checkout" class="form-select" value="'.$row['att_checkout'].'"> 
                                                                <option value="Full day">Full day</option>
                                                                <option value="Half-a-day">Half-a-day</option>
                                                                <option value="Over Duty">Over Duty</option>
                                                                </select>
                                                              </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="multicol-username">Pay</label>
                                                    <input required type="number" class="form-control" name="att_pay" id="att_pay" value="'.$row['att_pay'].'"/>
                                                </div>
                                                
                                                <div class="col-sm-4">
                                                <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
                                                    </div>
                                                
                                                <div class="col-md-12">
                                                                <br>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                                </div>
                                                </form>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        


<div class="modal fade" id="addcheckout'.$row['emp_id'].'" tabindex="-1" aria-hidden="true">
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
                <tr>
                <td>' . $row['emp_id'] . '</td>
                    <td>' . $row['emp_name'] . '</td>
                    <td>' . $row['cmp_id'] . '</td>
                    <td>' . $row['cmp_name'] . '</td>
                    <td>' . $row['att_date'] . '</td>
                    <td>' . $row['att_checkout'] . '</td>
                    <td>' . $row['att_pay'] . '</td>
                    <td>
                    <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="detailList">
                    <a class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#addcheckout' . $row['att_id'] . '">Checkout</a>
                    <a class="dropdown-item text-danger" href="delete_attendance.php?emp_id='.$row['emp_id'].'&cmp_id='.$row['cmp_id'].'&att_date='.$row['att_date'].'&att_checkout='.$row['att_checkout'].'&att_pay='.$row['att_pay'].'">Delete</a>
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
            <!-- </div> 
            </div>
            </div> 
            </div> -->
        


    <?php include 'footer.php'; ?>