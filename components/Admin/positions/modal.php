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
<button type="button" class="btn btn-primary insertButton" data-bs-toggle="modal" data-bs-target="#posModal">
  Add
</button>

<!-- Modal Structure -->
<div class="modal fade" id="posModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel">Position Form</h5>
        <a href="position.php"><i class="fa fa-close btn-close" data-bs-dismiss="modal" aria-label="Close"
            style="font-size:24px;color:red"></i></a>
      </div>
      <div class="modal-body">
        <form action="position.php" method="POST">
          <!-- Employee Name and Department -->
          <div class="form-row">
            <div class="input-data">
              <label for="pos_name">Name</label><br>
              <input type="text" id="pos_name" name="pos_name" id="pos_name" value="" required
                class="form-control">
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="pos_department_id">Department</label><br>
              <select name="pos_department_id" id="pos_department_id" required class="form-control">
              <option value="" selected>Select Department...</option>
                <?php 
                    foreach($departments as $department){
                        echo " <option class='department' value='$department[id]' >$department[name]</option>";
                    }
                ?>
              </select>
              <div class="underline"></div>
            </div>
            </div>


            <input type="hidden" name='pos_id' id="pos_id" value="">

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