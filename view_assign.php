<?php
include 'asap.php';
include 'header.php';
include 'toolbar.php';

// Check if cmp_id is provided in the URL
$cmp_id = isset($_GET['cmp_id']) ? $_GET['cmp_id'] : null;

// Use $cmp_id as needed, such as performing database operations or displaying information
?>

<div class="layout-page">
    <?php include 'topbar.php'; ?>

    <div class="content-wrapper">
        <div style="text-align: right; margin:35px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignNewemployee">
                <i class="fa fa-user-plus menu-icon-1"></i> &nbsp;Assign Employee
            </button>
        </div>

        <!-- Display Assigned Employees Table -->
        <div class="container-xxl flex-grow-1 container-p-y" style="padding-bottom: 0px !important; padding-top: 0px !important;">
            <div class="row">
                <div class="card" style="padding: 0px;">
                    <!-- tab panel enquiry -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Company Name</th>
                                            <th>Employee ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Fetch assigned employees and their corresponding companies
                                        $query = "SELECT * FROM m_assign WHERE cmp_id = :cmp_id"; // Filter by cmp_id
                                        $stmt = $conn->prepare($query);
                                        $stmt->bindParam(':cmp_id', $cmp_id);
                                        
                                        try {
                                            $stmt->execute();
                                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            foreach ($result as $row) {
                                                echo '
                                                    <tr>
                                                        <td>' . $row['emp_name'] . '</td>
                                                        <td>' . $row['cmp_name'] . '</td>
                                                        <td>' . $row['emp_id'] . '</td>
                                                        <td>
                                                        <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="detailList">
                                                        <a class="dropdown-item text-danger" href="delete_assign.php?emp_id='.$row['emp_id'].'&cmp_id='.$row['cmp_id'].'">Delete</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Project Modal -->
    <div class="modal fade" id="assignNewemployee" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-assign-new-employee">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="text-center mb-4">
                        <h3 class="address-title mb-2"><i class="fas fa-user-tie"></i> Employee Details</h3>
                        <form method="POST" action="add_assign.php">
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <label class="form-label" for="emp_name">Select Employee Name</label>
                                    <select class="form-control" name="emp_id" id="emp_id" required>
                                        <?php
                                        $sql = "SELECT emp_id, emp_name FROM m_employee"; // Fetch emp_id along with emp_name
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        if (count($employees) > 0) {
                                            echo '<option value="0">Select</option>';
                                            foreach ($employees as $employee) {
                                                echo '<option value="' . $employee['emp_id'] . '">' . $employee['emp_name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
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

    <?php include 'footer.php'; ?>
