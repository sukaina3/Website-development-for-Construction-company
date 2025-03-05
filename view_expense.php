
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
    <i class="fa fa-plus"></i> &nbsp;Add Expense
  </button> 
</div>

        <!-- Add New Address Modal -->
              <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Expense details</h3>
                   <form class="card-body" method="post" action="add_expense.php" enctype="multipart/form-data">
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Expense Type</label>
                        <select name="exp_type" class="form-select">
                          <option value="Fuel">Fuel</option>
                          <option value="Transport">Transport</option>
                          <option value="Others">Others</option>
                        </select>
                      </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Date</label>
                        <input required type="date" class="form-control" name="exp_date" id="exp_date" />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Amount</label>
                        <input required type="number" class="form-control" name="exp_amount" id="exp_amount" />
                      </div>
                      
                      <div class="col-md-4">
                        <label class="form-label" for="multicol-username">Payment Modes</label>
                        <select name="exp_mode" class="form-select">
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
                        <label class="form-label" for="multicol-username">Description</label>
                        <input required type="text" class="form-control" name="exp_desc" id="exp_desc" />
                      </div>
                        </select>
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
            


            <div class="container-xxl flex-grow-1 container-p-y"  style="padding-bottom: 0px !important; padding-top: 0px !important;">
  <div class="row">
    <div class="card" style="padding: 0px;">
        
        
        
        <div class="nav-align-top mb-4">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
        <div class="table-responsive">
          <table class="table">
    <thead>
        <tr>
            <th>Expense type</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM m_expense ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo '
            
        


  <!-- Add New Address Modal -->
              <div class="modal fade" id="profile'.$row['exp_id'].'" tabindex="-1" aria-hidden="true">
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
                <td>' . $row['exp_type'] . '</td>
                <td>' . $row['exp_date'] . '</td>
                <td>' . $row['exp_amount'] . '</td>
                <td>' . $row['exp_mode'] . '</td>
                <td>' . $row['exp_desc'] . '</td>
                <td>
                <div class="dropdown">
          <button class="btn p-0" type="button" id="expenseList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="expenseList">
            <a class="dropdown-item text-danger" href="delete_expense.php?exp_id='.$row['exp_id'].'">Delete</a>
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
              </div>
            <!-- / Content -->

   
          <?php
              include 'footer.php';
          ?>
