<?php 
include '../../database/db.php';
$departments = "select * from departments";
$get_departments = $conn->prepare($departments);
$get_departments->execute();
$departments = $get_departments->fetchAll();
// print_r($_POST);

include '../alert/alert.php';
include './services/delete.php';

?>
<head>
  <link rel="stylesheet" href="../index.css">
</head>
<div>
    <h1>Departments</h1>
    <?php include 'modal.php';?>
    
<table id="myTable" class="display">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 

    foreach($departments as $department){
      echo "<tr>
      <td>$department[id]</td>
      <td>$department[name]</td>";
      echo "<td>
      <a href='#?edit_id=" . $department['id'] . "'>
      <button type='button' class='btn btn-success editButton' data-bs-toggle='modal' data-bs-target='#deptModal'
data-bs-whatever='@mdo' value='$department[id]'>
        Edit
      </button>
    </a>
      <a href='department.php?delete_id=$department[id]'>
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
var dept_id = $(this).val(); 
console.log(dept_id);

$.ajax({
  method: 'POST',
  url: 'get_dept_data.php',
  data: {id:dept_id},
  dataType: 'json',
  contentType: 'application/x-www-form-urlencoded',
  success: function(response){
    console.log(response);
      $('#dept_name').val(response.name);

      $('#dept_id').val(response.id);
  },
  error: function(){
    alert('Error in fetching employee data');
  }
})

})

});
</script>
