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
<button type="button" class="btn btn-primary insertButton" data-bs-toggle="modal" data-bs-target="#projectModal">
  Add
</button>

<!-- Modal Structure -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel">Position Form</h5>
        <a href="project.php"><i class="fa fa-close btn-close" data-bs-dismiss="modal" aria-label="Close"
            style="font-size:24px;color:red"></i></a>
      </div>
      <div class="modal-body">
        <form action="project.php" method="POST">
          <!-- Employee Name and Department -->
          <div class="form-row">
            <div class="input-data">
              <label for="project_name">Name</label><br>
              <input type="text" id="project_name" name="project_name" id="project_name" value="" required
                class="form-control">
              <div class="underline"></div>
            </div>
              <div class="input-data">
                <label for="project_status">Status</label><br>
                <select name="project_status" id="project_status" required class="form-control">
                  <option class="status" id="inactive" value="0" >Inactive</option>
                  <option class="status" id="active" value="1" >Active</option>
                </select>
                <div class="underline"></div>
              </div>

            </div>


            <input type="hidden" name='project_id' id="project_id" value="">

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