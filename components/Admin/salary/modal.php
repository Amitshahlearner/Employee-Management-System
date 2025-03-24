<?php
$employees = "select e.emp_name,e.id from employee e;";
$get_employees = $conn->prepare($employees);
$get_employees->execute();
$employees = $get_employees->fetchAll();

include '../../database/db.php';
include './services/insertUpdate.php';
?>

<head>
  <link rel="stylesheet" href="modal.css">
</head>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary insertButton" data-bs-toggle="modal" data-bs-target="#salaryModal">
  Add
</button>

<!-- Modal Structure -->
<div class="modal fade" id="salaryModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel">Salary Form</h5>
        <a href="salary.php"><i class="fa fa-close btn-close" data-bs-dismiss="modal" aria-label="Close"
            style="font-size:24px;color:red"></i></a>
      </div>
      <div class="modal-body">
        <form action="salary.php" method="POST">
          <!-- Employee Name and Department -->
          <div class="form-row">
            <div class="input-data">
              <label for="emp_id">Employee Name</label><br>
              <select name="emp_id" id="emp_id" required class="form-control">
                <option value="" selected>Select Employee Name...</option>
                <?php
                foreach ($employees as $employee) {
                  echo " <option class='employee' value='$employee[id]' >$employee[emp_name]</option>";
                }
                ?>
              </select>
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="base_salary">Base salary</label><br>
              <input type="number" id="base_salary" name="base_salary" id="base_salary" value="" required
                class="form-control">
              <div class="underline"></div>
            </div>
          </div>

          <div class="form-row">
            <div class="input-data">
              <label for="salary_allowance">Allowance</label><br>
              <input type="number" id="salary_allowance" name="salary_allowance" id="salary_allowance" value="" required class="form-control">
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="salary_bonus">Bonus</label><br>
              <input type="number" id="salary_bonus" name="salary_bonus" id="salary_bonus" value="" required class="form-control">
              <div class="underline"></div>
            </div>
          </div>

          <div class="form-row">
            <div class="input-data">
              <label for="total_salary">Total Salary</label><br>
              <input type="number" id="total_salary" name="total_salary" id="total_salary" value="" required class="form-control" readonly>
              <div class="underline"></div>
            </div>
          </div>


          <input type="hidden" name='salary_id' id="salary_id" value="">

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