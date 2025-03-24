<?php 
include '../../database/db.php';

$employees = "select e.id,e.emp_name,e.emp_email,e.emp_phone,e.emp_dob,
              e.emp_gender,e.emp_joining_date,e.emp_status, d.name
              from employee e join departments d On e.emp_department_id = d.id";

$get_employees = $conn->prepare($employees);
$get_employees->execute();
$employees = $get_employees->fetchAll();
// print_r($_POST);

include '../alert/alert.php';
include './services/delete.php'
?>
<head>
  <link rel="stylesheet" href="../index.css">
</head>

<div>
    <h1>Employee Management System</h1>
    <?php include 'add_modal.php';?>

<table id="myTable" class="display">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>DOB</th>
      <th>Gender</th>
      <th>Joining Date</th>
      <th>Department</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 

    foreach($employees as $employee){
      echo "<tr>
      <td>$employee[emp_name]</td>
      <td>$employee[emp_email]</td>
      <td>$employee[emp_phone]</td>
      <td>$employee[emp_dob]</td>
      <td>$employee[emp_gender]</td>
      <td>$employee[emp_joining_date]</td>
      <td>$employee[name]</td>";
      echo $employee['emp_status']==1 ? '<td>Active</td>' : '<td>InActive</td>' ;
      echo "<td>
      <a href='#?edit_id=" . $employee['id'] . "'>
        <button type='button' class='editButton' data-bs-toggle='modal' data-bs-target='#employeeModal'
data-bs-whatever='@mdo' value='$employee[id]'>
          <i class='fa fa-edit' style='font-size:24px;color:green;'></i>
        </button>
      </a>
        <a href='employee.php?delete_id=$employee[id]'>
        <button type='button' class='btn btn-successs editButton' value=''>
            <i class='fa fa-trash-o' style='font-size:24px;color:red;'></i>
        </button>
        </a>
      </td>
      </tr>"
      ;
    }
  ?>
  </tbody>
</table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="../index.js"></script>

<script>



  $('.editButton').click(function(){
    var employee_id = $(this).val(); 
    console.log(employee_id);
    var selectedProjectsContainer = $('#selected-project-container');
    var selectedRolesContainer = $('#selected-roles-container');

    $.ajax({
      method: 'POST',
      url: 'get_employee_data.php',
      data: {id:employee_id},
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      success: function(response){
        console.log(response);
          $('#emp_name').val(response.emp_name);
          $('#emp_email').val(response.emp_email);
          $('#emp_phone').val(response.emp_phone);
          $('#emp_dob').val(response.emp_dob);
          $('#emp_joining_date').val(response.emp_joining_date);
          $('#emp_address').val(response.emp_address);

          if(response.emp_gender == 'M'){
            $("#male").prop('checked', true)
          }
          else if(response.emp_gender == 'F'){
            $("#female").prop('checked', true)
          }
          else{
            $("#other").prop('checked', true)
          }

          $('.department').each(function(){
            if($(this).val() == response.emp_department_id) {
              $(this).prop('selected', true);
            }
          });

          if(response.emp_status==1){
            $("#active").prop('selected', true);
          }else{
            $("#inactive").prop('selected', true);
          }
          $('#emp_id').val(employee_id);
         
          
          
      },
      error: function(){
        alert('Error in fetching employee data');
      }
    });
    });

  $('#emp_department_id').on('change', function() {
    var dept_id = $(this).val();
    console.log("Selected Department ID: " + dept_id);
    $('#selected-roles-container').empty();

    if (dept_id) {
        $.ajax({
            method: 'POST',
            url: 'get_role_position_data.php', 
            data: { id: dept_id }, 
            dataType: 'json', 
            success: function(response) {
                console.log(response); 

                $('#emp_role_id').empty().append('<option value="">Select Role...</option>');

                $.each(response, function(index,role) {
                  if(role.role_name){
                    $('#emp_role_id').append('<option value="' + role.id + '">' + role.role_name + '</option>');
                  }
                  else if(role.pos_name){
                    $('#emp_position_id').append('<option value="' + role.id + '">' + role.pos_name + '</option>');
                  }else{
                    
                  }
                });
            },
            error: function() {
                alert('Error in fetching Role data');
            }
        });
    }
    else {
        $('#emp_role_id').empty().append('<option value="">Select Role...</option>');
    }
  }); 

  $('#emp_role_id').change(function () {
        var selectedRoleId = $(this).val(); 
        var selectedRoleName = $("#emp_role_id option:selected").text();  
        var selectedRolesContainer = $('#selected-roles-container');  

        if (selectedRoleId && !$('.selected-role[data-role-id="' + selectedRoleId + '"]').length) {
            // Create a new div for the selected role with a cross button
            var selectedRoleItem = $('<div class="selected-role" style="display:inline; background-color:##b1b5b2; margin-right:5px" data-role-id="' + selectedRoleId + '">')
                .text(selectedRoleName)
                .append(`<input type="hidden" name=roleValue[] id=roleValue value=${selectedRoleId}> <span class="close-btn" style=margin:5px 5px;cursor:pointer;><i class="fa fa-close" style="font-size:18px"></i></span>`);

            selectedRolesContainer.append(selectedRoleItem);

            $('#emp_role_id').val('');  // Reset the select field
        }
    });

    // Event listener for the cross button to remove a selected role
    $(document).on('click', '.close-btn', function () {
        var roleId = $(this).parent().data('role-id');  // Get the role ID from the clicked item

        // Remove the selected role from the displayed list
        $(this).parent().remove();

        // If necessary, you can deselect the corresponding option in the select dropdown
        // This step may be optional based on your requirement to update the dropdown
        $('#emp_role_id option[value="' + roleId + '"]').prop('selected', false);
    });

    $('#emp_project_id').change(function () {
    var selectedProjectId = $(this).val();
    var selectedProjectName = $("#emp_project_id option:selected").text();
    var selectedProjectsContainer = $('#selected-project-container');

    if (selectedProjectId && !$('.selected-project[data-project-id="' + selectedProjectId + '"]').length) {
        var selectedProjectItem = $('<div class="selected-project" style="display:inline; margin-right:5px" data-project-id="' + selectedProjectId + '">')
            .text(selectedProjectName)
            .append(`<input type="hidden" name="projectValue[]" id="projectValue" value="${selectedProjectId}"> <span class="close-btn" style="margin:5px 5px;cursor:pointer;"><i class="fa fa-close" style="font-size:18px"></i></span>`);

        selectedProjectsContainer.append(selectedProjectItem);

        $('#emp_project_id').val(''); // Reset the select field
    }
});

$(document).on('click', '.selected-project .close-btn', function () {
    var projectId = $(this).parent().data('project-id'); 

    $(this).parent().remove();

    $('#emp_project_id option[value="' + projectId + '"]').prop('selected', false);
});

</script>
