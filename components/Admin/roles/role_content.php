<?php 
include '../../database/db.php';

$roles = "select r.id, r.role_name, d.name from roles r join departments d on r.role_department_id = d.id";
$get_roles = $conn->prepare($roles);
$get_roles->execute();
$roles = $get_roles->fetchAll();
// print_r($roles);
// print_r($_POST);
$departments = "select * from departments";
$get_departments = $conn->prepare($departments);
$get_departments->execute();
$departments = $get_departments->fetchAll();

include './services/delete.php';
include '../alert/alert.php';
?>
<head>
  <link rel="stylesheet" href="../index.css">
</head>
<div>
    <h1>Roles</h1>
    <?php include 'modal.php' ?>
    <!-- <form action="role.php" method="post" style="display: none;" class="addroleform">
        <input type="text" class="role_name" name="role_name" placeholder="Enter Role..." value="<?php echo $role_name?? '' ?>" required>
        <input type="hidden" name='dept_id' value="<?php echo $_GET['edit_id'] ?>"> 
        <select name="role_dept_id" id="" style="height:30px" required>
          <option value="" selected>Select Department</option>
          <?php 
            // foreach($departments as $department){
            //     $selected = $role_dept_id==$department['id'] ? 'selected'  : '';
            //     echo " <option value='$department[id]'  $selected >$department[name]</option>";
            // }
          ?>
        </select>
        <button class="btn btn-primary addButton" ><?php echo $_GET['edit_id']?'Edit':'Add' ?></button>
    </form> -->

<table id="myTable" class="display">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Department</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 

    foreach($roles as $role){
      echo "<tr>
      <td>$role[id]</td>
      <td>$role[role_name]</td>
      <td>$role[name]</td>";
      echo "<td>
      <a href='#?edit_id=" . $role['id'] . "'>
      <button type='button' class='btn btn-success editButton' data-bs-toggle='modal' data-bs-target='#roleModal'
data-bs-whatever='@mdo' value='$role[id]'>
        Edit
      </button>
    </a>
      <a href='role.php?delete_id=$role[id]'>
      <button type='button' class='btn btn-danger editButton' value=''>
          Delete
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

  $(document).ready(function(){

    $('.editButton').click(function(){
    var role_id = $(this).val(); 
    console.log(role_id);

    $.ajax({
      method: 'POST',
      url: 'get_role_data.php',
      data: {id:role_id},
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      success: function(response){
        console.log(response);
          $('#role_name').val(response.role_name);

          $('.department').each(function(){
            if($(this).val() == response.role_department_id) {
              $(this).prop('selected', true);
            }
          });

          $('#role_id').val(response.id);
      },
      error: function(){
        alert('Error in fetching employee data');
      }
    });

    function ValidateForm(event){
    let isValid = true;
    console.log("form validation");
    $(".field").each(function () {
        if (!$(this).val()){
          
          isValid = false;
        };
    });

    if (!isValid) {
        alert("Please fill all input");
        event.preventDefault(); 
    }
    
    return isValid ;
  }
  
  $("form").on("submit", function(event) {
    //event.preventDefault(); 

    console.log("Form submission prevented for debugging.");

    if (ValidateForm(event)) {
      console.log("Validation passed. Proceeding with form submission.");
      
    } else {
      console.log("Validation failed. Form not submitted.");
    }
    return true;
  });

  })

  

  
  
});

</script>


