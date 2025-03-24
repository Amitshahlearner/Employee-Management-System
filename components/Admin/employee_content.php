<?php 
include '../database/db.php';
$employees = "select e.emp_name,e.emp_email,e.emp_phone,e.emp_dob,
              e.emp_gender,e.emp_joining_date,e.emp_status, d.name
              from employee e join departments d On e.emp_department_id = d.id";
$get_employees = $conn->prepare($employees);
$get_employees->execute();
$employees = $get_employees->fetchAll();
print_r($employees);

?>

<div>
    <h1>Employee Management System</h1>
    <a href="add_employee.php"> <button class="btn btn-primary adButton">Add</button> </a>

<table id='myTable'>
  <thead>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>DOB</th>
    <th>Gender</th>
    <th>Joining Date</th>
    <th>Department</th>
    <th>Status</th>
    <th>Action</th>

  </thead>
  <tbody>
  <?php 

    foreach($employees as $employee){
      // $departments = "select * from departments where id = $employee[emp_department_id]";
      // $get_departments = $conn->prepare($departments);
      // $get_departments->execute();
      // $department = $get_departments->fetch(PDO::FETCH_ASSOC);
      // <td>$employee[emp_status]</td>
      echo "<tr>
      <td>$employee[emp_name]</td>
      <td>$employee[emp_email]</td>
      <td>$employee[emp_phone]</td>
      <td>$employee[emp_dob]</td>
      <td>$employee[emp_gender]</td>
      <td>$employee[emp_joining_date]</td>
      <td>$employee[name]</td>
      <?php echo '$employee[emp_status]==1 ? '<td>Active</td>' : '<td>InActive</td>' '; ?>
      <td>
        <a href='#edit_id'>
        <button type='button' class='btn btn-successs editButton' value=''>
            <i class='fa fa-edit' style='font-size:24px;color:green;'></i>
        </button>
        </a>
        <a href='#delete_id'>
        <button type='button' class='btn btn-successs editButton' value=''>
            <i class='fa fa-trash-o' style='font-size:24px;color:red;'></i>
        </button>
        </a>
      </td>
      </tr>"
      ;
    //   echo $employee['emp_status']==1 ? '<td>Active</td>' : '<td>InActive</td>';
    //   echo "
      // <td>
      //   <a href='#edit_id'>
      //   <button type='button' class='btn btn-successs editButton' value=''>
      //       <i class='fa fa-edit' style='font-size:24px;color:green;'></i>
      //   </button>
      //   </a>
      //   <a href='#delete_id'>
      //   <button type='button' class='btn btn-successs editButton' value=''>
      //       <i class='fa fa-trash-o' style='font-size:24px;color:red;'></i>
      //   </button>
      //   </a>
      // </td>
      
    //   ";
    // echo "</tr>";
    }
  ?>
  </tbody>
</table>
</div>