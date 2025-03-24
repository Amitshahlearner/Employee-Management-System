<?php
include '../database/db.php';
$salary = "select * from salary";
$get_salary = $conn->prepare($salary);
$get_salary->execute();
$salary = $get_salary->fetchAll();
// print_r($salary);

$departments = "select * from departments";
$get_departments = $conn->prepare($departments);
$get_departments->execute();
$departments = $get_departments->fetchAll();
// print_r($departments);

$roles = "select * from roles";
$get_roles = $conn->prepare($roles);
$get_roles->execute();
$roles = $get_roles->fetchAll();

?>

<style>
    .form-row {
        /* display: flex;
        justify-content: space-between; */
        margin-top: 10px; 
    }
    .input-data{
        width: 50%;
    }
    .submit-btn{
        float: right;
        padding: 20PX;
    }
</style>

<div class="container">
    <div class="text">
        <h1>Add New Employee</h1>
    </div>
    <form action="index.php" method="POST">
        <!-- Employee Name and Email -->
        <div class="form-row">
            <div class="input-data">
                <label for="emp_name">Name</label><br>
                <input type="text" name="emp_name" id="emp_name" required>
                <div class="underline"></div>
            </div>
            <div class="input-data">
                <label for="emp_email">Email</label><br>
                <input type="email" name="emp_email" id="emp_email" required>
                <div class="underline"></div>
            </div>
        </div>

        <!-- Phone Number and Gender -->
        <div class="form-row">
            <div class="input-data">
                <label for="emp_phone">Phone Number</label><br>
                <input type="text" name="emp_phone" id="emp_phone" required>
                <div class="underline"></div>
            </div>
            <div class="input-data">
                <label for="emp_gender">Gender</label><br>
                <label for="male">M</label>
                <input type="radio" name="emp_gender" value="M" id="male" required>
                <label for="female">F</label>
                <input type="radio" name="emp_gender" value="F" id="female" required>
                <label for="other">O</label>
                <input type="radio" name="emp_gender" value="O" id="other" required>
                <div class="underline"></div>
            </div>
        </div>

        <!-- Departments and Date of Birth -->
        <div class="form-row">
            <div class="input-data">
                <label for="emp_department_id">Department</label><br>
                <select name="emp_department_id" id="emp_department_id" required>
                    <!-- Replace these options with actual department data -->
                    <?php 
                        foreach($departments as $department){
                            echo " <option value='$department[id]'>$department[name]</option>";
                        }
                    ?>
                    <!-- <option value="1">HR</option>
                    <option value="2">Finance</option>
                    <option value="3">Engineering</option> -->
                </select>
                <div class="underline"></div>
            </div>
            <div class="input-data">
                <label for="emp_dob">Date of Birth</label><br>
                <input type="date" name="emp_dob" id="emp_dob" required>
                <div class="underline"></div>
            </div>
        </div>

        <!-- Employee Image and Joining Date -->
        <div class="form-row">
            <div class="input-data">
                <label for="emp_image">Upload Image</label><br>
                <input type="file" name="emp_image" id="emp_image">
                <div class="underline"></div>
            </div>
            <div class="input-data">
                <label for="emp_joining_date">Joining Date</label><br>
                <input type="date" name="emp_joining_date" id="emp_joining_date" required>
                <div class="underline"></div>
            </div>
        </div>

        <!-- Employee Status, and Salary -->
        <div class="form-row">
            <div class="input-data">
                <label for="emp_status">Status</label><br>
                <select name="emp_status" id="emp_status" required>
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
                <div class="underline"></div>
            </div>
            <!-- <div class="input-data">
                <label for="emp_department_id">Department</label><br>
                <select name="emp_department_id" id="emp_department_id" required>
                     Replace these options with actual department data 
                    <option value="1">HR</option>
                    <option value="2">Finance</option>
                    <option value="3">Engineering</option>
                </select>
                <div class="underline"></div>
            </div> -->
            <div class="input-data">
                <label for="emp_salary_id">Role for Salary</label><br>
                <select name="emp_salary_id" id="emp_salary_id" required>
                    <!-- Replace these options with actual salary data -->
                    <?php
                    foreach($roles as $role){
                        echo "<option value='$role[role_salary_id]'>$role[role_name]</option>";
                    }
                    
                    ?>
                    
                </select>
                <div class="underline"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data textarea">
                <label for="emp_address">Address</label><br>
                <textarea name="emp_address" id="emp_address" rows="5" cols="75" required></textarea><br>
                <div class="underline"></div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-row submit-btn">
            <div class="input-data">
                <div class="inner"></div>
                <button type="button" id="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>