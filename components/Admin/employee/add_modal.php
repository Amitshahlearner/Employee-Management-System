<?php 

$departments = "select * from departments";
$get_departments = $conn->prepare($departments);
$get_departments->execute();
$departments = $get_departments->fetchAll();

$project = "select * from projects";
$get_projects = $conn->prepare($project);
$get_projects->execute();
$projects = $get_projects->fetchAll();
// print_r($projects);
include '../../database/db.php';
include './services/insertUpdate.php';
?>

<head>
    <link rel="stylesheet" href="add_modal.css">
</head>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary insertButton" data-bs-toggle="modal" data-bs-target="#employeeModal">
  Add
</button>

<!-- Modal Structure -->
<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel">Employee Form</h5>
        <a href="employee.php"><i class="fa fa-close btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size:24px;color:red"></i></a>
      </div>
      <div class="modal-body">
        <form action="employee.php" method="POST">
          <!-- Employee Name and Email -->
          <div class="form-row">
            <div class="input-data">
              <label for="emp_name">Name</label><br>
              <input class="field" type="text" id="emp_name" name="emp_name" id="emp_name" value="<?php echo $emp_name?? '' ?>" required class="form-control">
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="emp_email">Email</label><br>
              <input class="field" type="email" id="emp_email" name="emp_email" id="emp_email" value="<?php echo $emp_email?? '' ?>" required class="form-control">
              <div class="underline"></div>
            </div>
          </div>

          <!-- Phone Number and Gender -->
          <div class="form-row">
            <div class="input-data">
              <label for="emp_phone">Phone Number</label><br>
              <input class="field" type="text" name="emp_phone" id="emp_phone" value="<?php echo $emp_phone?? '' ?>" required class="form-control">
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="emp_gender">Gender</label><br>

              <div class="gender-radio">
                <label for="male">M</label>
                <input class="field" type="radio" name="emp_gender" value="M" id="male" <?php echo $emp_gender=='M'?'checked': '' ?> required>

                <label for="female">F</label>
                <input class="field" type="radio" name="emp_gender" value="F" id="female" <?php echo $emp_gender=='F'?'checked': '' ?> required>

                <label for="other">O</label>
                <input class="field" type="radio" name="emp_gender" value="O" id="other" <?php echo $emp_gender=='O'?'checked': '' ?> required>
              </div> 

              <div class="underline"></div>
            </div>
          </div>

          <!-- Departments and Date of Birth -->
          <div class="form-row">
            <div class="input-data">
              <label for="emp_department_id">Department</label><br>
              <select name="emp_department_id" id="emp_department_id" required class="form-control" >
              <option value="" selected>Select Department...</option>
                <?php 
                    foreach($departments as $department){
                        echo " <option class='department' value='$department[id]' >$department[name]</option>";
                    }
                ?>
              </select>
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="emp_role_id">Roles</label><br>
              <select name="emp_role_id" id="emp_role_id" class="form-control" >
              <option value="" selected>Select roles...</option>
              </select>
              <div id="selected-roles-container" class="selected-roles-container"></div>
              <div class="underline"></div>
            </div>
            
          </div>

          <!-- Position and Project -->

          <div class="form-row">
            <div class="input-data">
              <label for="emp_position_id">Positions</label><br>
              <select name="emp_position_id" id="emp_position_id" class="form-control" >
              <option value="" selected>Select positions...</option>
              </select>
              <div id="selected-positions-container" class="selected-positions-container"></div>
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="emp_project_id">Projects</label><br>
              <select name="emp_project_id" id="emp_project_id" class="form-control" >
              <option value="" selected>Select projects...</option>
              <?php
              foreach ($projects as $project) {
                  echo " <option class='emp_project_id' value='$project[id]' >$project[project_name]</option>";
              }
              ?>
              </select>
              <div id="selected-project-container" class="selected-project-container"></div>
              <div class="underline"></div>
            </div>
          </div>

          <!-- Employee Image and Joining Date -->
          <div class="form-row">
            <div class="input-data">
              <label for="emp_image">Upload Image</label><br>
              <input class="field" type="file" name="emp_image" id="emp_image" class="form-control">
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="emp_joining_date">Joining Date</label><br>
              <input class="field" type="date" name="emp_joining_date" id="emp_joining_date" value="<?php echo $emp_joining_date?? '' ?>" required class="form-control">
              <div class="underline"></div>
            </div>
          </div>

          <!-- Employee Status, and Password -->
          <div class="form-row">
            <div class="input-data">
              <label for="emp_status">Status</label><br>
              <select name="emp_status" id="emp_status" required class="form-control">
                <option class="status" id="inactive" value="0" <?php echo $emp_status==0?'selected':'' ?> >Inactive</option>
                <option class="status" id="active" value="1"  <?php echo $emp_status==1?'selected':'' ?>>Active</option>
              </select>
              <div class="underline"></div>
            </div>
            <div class="input-data">
              <label for="emp_dob">Date of Birth</label><br>
              <input class="field" type="date" name="emp_dob" id="emp_dob" value="<?php echo $emp_dob?? '' ?>" required class="form-control">
              <div class="underline"></div>
            </div>
          </div>

          <div class="form-row">
            
            <div class="input-data">
              <label for="password">Password</label><br>
              <input class="field" type="password" name="password" id="password" required class="form-control">
              <div class="underline"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="input-data textarea">
              <label for="emp_address">Address</label><br>
              <textarea name="emp_address" id="emp_address" rows="5" cols="75" value="<?php echo $emp_address ?? '' ?>" required class="form-control"></textarea><br>
              <div class="underline"></div>
            </div>
          </div>
          <input type="hidden" name='emp_id' id="emp_id" value="<?php echo $_GET['edit_id'] ?>"> 

          <!-- Submit Button -->
          <div class="form-row submit-btn">
            <div class="input-data">
              <div class="inner"></div>
              <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
