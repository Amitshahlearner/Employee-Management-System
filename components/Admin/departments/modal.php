<?php

$departments = "select * from departments";
$get_departments = $conn->prepare($departments);
$get_departments->execute();
$departments = $get_departments->fetchAll();

include '../../database/db.php';
include './services/insertUpdate.php';
?>

<head>
  <link rel="stylesheet" href="modal.css">
</head>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary insertButton" data-bs-toggle="modal" data-bs-target="#deptModal">
  Add
</button>

<!-- Modal Structure -->
<div class="modal fade" id="deptModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel">Department Form</h5>
        <a href="department.php"><i class="fa fa-close btn-close" data-bs-dismiss="modal" aria-label="Close"
            style="font-size:24px;color:red"></i></a>
      </div>
      <div class="modal-body">
        <form action="department.php" method="POST">
          <!-- Employee Name and Department -->
          <div class="form-row">
            <div class="input-data">
              <label for="dept_name">Department Name</label><br>
              <input type="text" id="dept_name" name="dept_name" id="dept_name" value="" Placeholder='Enter Dept...' required
                class="form-control">
              <div class="underline"></div>
            </div>
            
            </div>


            <input type="hidden" name='dept_id' id="dept_id" value="">

            <!-- Submit Button -->
            <div class="form-row submit-btn">
              <div class="input-data">
                <div class="inner"></div>
                <button type="submit" id="submit" class="btn btn-primary" style="float: right;">Submit</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>