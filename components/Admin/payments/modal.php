<?php
include '../../database/db.php';
$employees = "select e.id from employee e;";
$get_employees = $conn->prepare($employees);
$get_employees->execute();
$employees = $get_employees->fetchAll();

include './services/insertUpdate.php';
?>

<head>
  <link rel="stylesheet" href="modal.css">
</head>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary insertButton" data-bs-toggle="modal" data-bs-target="#paymentModal">
  Add
</button>

<!-- Modal Structure -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel">Payment Form</h5>
        <a href="payment.php"><i class="fa fa-close btn-close" data-bs-dismiss="modal" aria-label="Close"
            style="font-size:24px;color:red"></i></a>
      </div>
      <div class="modal-body">
        <form action="payment.php" method="POST">
          <!-- Employee Name and Department -->
          <div class="form-row">
            <div class="input-data">
              <label for="emp_id">Employee Id</label><br>
              <select name="emp_id" id="emp_id" required class="form-control">
                <option value="" selected>Select Employee Id...</option>
                <?php
                foreach ($employees as $employee) {
                  echo " <option class='employee' value='$employee[id]' >$employee[id]</option>";
                }
                ?>
              </select>
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="pay_date">Date</label><br>
              <input type="date" id="pay_date" name="pay_date" id="pay_date" value="" required
                class="form-control">
              <div class="underline"></div>
            </div>
          </div>

          <div class="form-row">
            <div class="input-data">
              <label for="gross_salary">Gross Salary</label><br>
              <input type="number" id="gross_salary" name="gross_salary" id="gross_salary" value="" required class="form-control">
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="deduction_on_salary">Deduction</label><br>
              <input type="number" id="deduction_on_salary" name="deduction_on_salary" id="deduction_on_salary" value="" required class="form-control">
              <div class="underline"></div>
            </div>
          </div>

          <div class="form-row">
            <div class="input-data">
              <label for="net_salary">Net payment</label><br>
              <input type="number" id="net_salary" name="net_salary" id="net_salary" value="" required class="form-control" readonly>
              <div class="underline"></div>
            </div>
          </div>


          <input type="hidden" name='payment_id' id="payment_id" value="">

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