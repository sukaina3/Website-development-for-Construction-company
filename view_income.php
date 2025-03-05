<?php
include 'asap.php';
include 'header.php';
include 'toolbar.php';

// Check if cmp_id is provided in the URL
$sql = "SELECT exp_id, cmp_name, exp_amount, exp_date, exp_mode, exp_desc FROM m_income";
$stmt = $conn->prepare($sql);
$stmt->execute();
$incomes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="layout-page">
    <?php include 'topbar.php'; ?>

    <div class="content-wrapper">
        <div style="text-align: right; margin:15px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignnewsite">
                <i class="fa fa-user-plus menu-icon-1"></i> &nbsp;Assign Site
            </button>
        </div>

        <!-- Add New Project Modal -->
        <div class="modal fade" id="assignnewsite" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-assign-new-site">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        <div class="text-center mb-4">
                            <h3 class="address-title mb-2"><i class="fas fa-user-tie"></i> Site and expense Details</h3>
                            <form method="POST" action="add_income.php">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="cmp_name">Select Site Name</label>
                                        <select class="form-control" name="cmp_id" id="cmp_id" required>
                                            <?php
                                            $sql = "SELECT cmp_id, cmp_name FROM m_site"; // Fetch cmp_id along with cmp_name
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            if (count($sites) > 0) {
                                                echo '<option value="0">Select</option>';
                                                foreach ($sites as $site) {
                                                    echo '<option value="' . $site['cmp_id'] . '">' . $site['cmp_name'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="col-md-4">
                                        <label class="form-label" for="exp_amount">Select Amount</label>
                                        <select class="form-control" name="exp_id" id="exp_id" required>
                                            <?php
                                            $sql = "SELECT exp_id, exp_amount FROM m_expense"; // Fetch cmp_id along with cmp_name
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            if (count($expenses) > 0) {
                                                echo '<option value="0">Select</option>';
                                                foreach ($expenses as $expense) {
                                                    echo '<option value="' . $expense['exp_id'] . '">' . $expense['exp_amount'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="col-md-4">
                                        <label class="form-label" for="exp_date">Select Date</label>
                                        <select class="form-control" name="exp_id" id="exp_id" required>
                                            <?php
                                            $sql = "SELECT exp_id, exp_date FROM m_expense"; // Fetch cmp_id along with cmp_name
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            if (count($expenses) > 0) {
                                                echo '<option value="0">Select</option>';
                                                foreach ($expenses as $expense) {
                                                    echo '<option value="' . $expense['exp_id'] . '">' . $expense['exp_date'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="col-md-4">
                                        <label class="form-label" for="exp_mode">Select Payment mode</label>
                                        <select class="form-control" name="exp_id" id="exp_id" required>
                                            <?php
                                            $sql = "SELECT exp_id, exp_mode FROM m_expense"; // Fetch cmp_id along with cmp_name
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            if (count($expenses) > 0) {
                                                echo '<option value="0">Select</option>';
                                                foreach ($expenses as $expense) {
                                                    echo '<option value="' . $expense['exp_id'] . '">' . $expense['exp_mode'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="col-md-4">
                                        <label class="form-label" for="exp_desc">Select Description</label>
                                        <select class="form-control" name="exp_id" id="exp_id" required>
                                            <?php
                                            $sql = "SELECT exp_id, exp_desc FROM m_expense"; // Fetch cmp_id along with cmp_name
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            if (count($expenses) > 0) {
                                                echo '<option value="0">Select</option>';
                                                foreach ($expenses as $expense) {
                                                    echo '<option value="' . $expense['exp_id'] . '">' . $expense['exp_desc'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-4">
                                        <input type="hidden" name="cmp_id" value="<?php echo $cmp_id; ?>">
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
                                            <th>Site Name</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Payment Mode</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($incomes as$row) {
                                            echo '
                                                <tr>
                                                    <td>' .$row['cmp_name'] . '</td>
                                                    <td>' .$row['exp_amount'] . '</td>
                                                    <td>' .$row['exp_date'] . '</td>
                                                    <td>' .$row['exp_mode'] . '</td>
                                                    <td>' .$row['exp_desc'] . '</td>
                                                    <td>
                
          <button class="btn p-0" type="button" id="labourList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="labourList">
            <a class="dropdown-item text-danger" href="delete_income.php?exp_id='.$row['exp_id'].'">Delete</a>
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
