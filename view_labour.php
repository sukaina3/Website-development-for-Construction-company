<?php
include 'asap.php';
include 'header.php';
include 'toolbar.php';

// Check if emp_id is provided in the URL
$sql = "SELECT emp_id, emp_name, lab_date, lab_mode, lab_amount, lab_desc FROM m_labour";
$stmt = $conn->prepare($sql);
$stmt->execute();
$labours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="layout-page">
    <?php include 'topbar.php'; ?>

    <div class="content-wrapper">
        <div style="text-align: right; margin:15px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewlabour">
                <i class="fa fa-user-plus menu-icon-1"></i> &nbsp;Add Labour-Pay
            </button>
        </div>

        <!-- Add New Project Modal -->
        <div class="modal fade" id="addnewlabour" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-add-new-labour">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        <div class="text-center mb-4">
                            <h3 class="address-title mb-2"><i class="fas fa-user-tie"></i>Labour Payment Details</h3>
                            <form method="POST" action="add_labour.php">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="emp_name">Select Employee</label>
                                        <select class="form-control" name="emp_id" id="emp_id" required>
                                            <?php
                                            $sql = "SELECT emp_id, emp_name FROM m_employee"; // Fetch emp_id along with emp_name
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            if (count($sites) > 0) {
                                                echo '<option value="0">Select</option>';
                                                foreach ($sites as $site) {
                                                    echo '<option value="' . $site['emp_id'] . '">' . $site['emp_name'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="col-md-4">
                                         <label class="form-label" for="multicol-username">Date</label>
                                         <input required type="date" class="form-control" name="lab_date" id="lab_date" />
                                         </div>
                      
                                         <div class="col-md-4">
                                         <label class="form-label" for="multicol-username">Payment Modes</label>
                                            <select name="lab_mode" class="form-select">
                                            <option value="Cash">Cash</option>
                                            <option value="Credit card Payment">Credit card Payment</option>
                                            <option value="Debit card Payment">Debit card Payment</option>
                                            <option value="Cheques">Cheques</option>
                                            <option value="Net Banking">Net Banking</option>
                                            <option value="Mobile Payments">Mobile Payments</option>
                                            <option value="UPI and QR codes">UPI and QR codes</option>
                                            </select>
                                          </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-username">Amount</label>
                                            <input required type="number" class="form-control" name="lab_amount" id="lab_amount" />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-username">Remarks</label>
                                            <input required type="text" class="form-control" name="lab_desc" id="lab_desc" />
                                        </div>
                                        
                                    </div>
                                    <!-- <div class="col-sm-4">
                                        <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
                                    </div> -->
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                                        
                                        

            <!-- Display Assigned sites Table -->
            <div class="container-xxl flex-grow-1 container-p-y"  style="padding-bottom: 0px !important; padding-top: 0px !important;">
  <div class="row">
    <div class="card" style="padding: 0px;">


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Date</th>
                                            <th>Payment Mode</th>
                                            <th>Amount</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($labours as $row) {
                                            echo '
                                                <tr>
                                                    <td>' . $row['emp_name'] . '</td>
                                                    <td>' . $row['lab_date'] . '</td>
                                                    <td>' . $row['lab_mode'] . '</td>
                                                    <td>' . $row['lab_amount'] . '</td>
                                                    <td>' . $row['lab_desc'] . '</td>
                                                    <td>
                
          <button class="btn p-0" type="button" id="labourList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="labourList">
            <a class="dropdown-item text-danger" href="delete_labour.php?emp_id='.$row['emp_id'].'">Delete</a>
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
                                  
    <?php include 'footer.php'; ?>
