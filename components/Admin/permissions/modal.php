<?php

$permissions = "select * from permissions";
$get_permissions = $conn->prepare($permissions);
$get_permissions->execute();
$permissions = $get_permissions->fetchAll();

include '../../database/db.php';
include './services/insertUpdate.php';
?>

<head>
  <link rel="stylesheet" href="modal.css">
</head>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary insertButton" data-bs-toggle="modal" data-bs-target="#permissionModal">
  Add
</button>

<!-- Modal Structure -->
<div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel">Permission Form</h5>
        <a href="permission.php"><i class="fa fa-close btn-close" data-bs-dismiss="modal" aria-label="Close"
            style="font-size:24px;color:red"></i></a>
      </div>
      <div class="modal-body">
        <form action="permission.php" method="POST">
          <!-- Employee Name and permission -->
          <div class="form-row">
            <div class="input-data">
              <label for="permission_name">Permission Name</label><br>
              <input type="text" id="permission_name" name="permission_name" id="permission_name" value="" Placeholder='Enter Permission...' required
                class="form-control">
              <div class="underline"></div>
            </div>
            
            </div>


            <input type="hidden" name='permission_id' id="permission_id" value="">

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