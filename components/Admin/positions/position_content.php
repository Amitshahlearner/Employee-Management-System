<?php 
include '../../database/db.php';

$positions = "select p.id, p.pos_name, d.name from positions p join departments d on p.pos_department_id = d.id";
$get_positions = $conn->prepare($positions);
$get_positions->execute();
$positions = $get_positions->fetchAll();
// print_r($roles);

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
    <h1>Positions</h1>
    <?php include 'modal.php';?>

<table id="myTable" class="display">
  <thead>
    <tr>
      <th>Id</th>
      <th>Position</th>
      <th>Department</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 

    foreach($positions as $position){
      echo "<tr>
      <td>$position[id]</td>
      <td>$position[pos_name]</td>
      <td>$position[name]</td>";
      echo "<td>
      <a href='#?edit_id=" . $position['id'] . "'>
      <button type='button' class='btn btn-success editButton' data-bs-toggle='modal' data-bs-target='#posModal'
data-bs-whatever='@mdo' value='$position[id]'>
        Edit
      </button>
    </a>
      <a href='position.php?delete_id=$position[id]'>
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
var pos_id = $(this).val(); 
console.log(pos_id);

$.ajax({
  method: 'POST',
  url: 'get_pos_data.php',
  data: {id:pos_id},
  dataType: 'json',
  contentType: 'application/x-www-form-urlencoded',
  success: function(response){
    console.log(response);
      $('#pos_name').val(response.pos_name);

      $('.department').each(function(){
        if($(this).val() == response.pos_department_id) {
          $(this).prop('selected', true);
        }
      });

      $('#pos_id').val(response.id);
  },
  error: function(){
    alert('Error in fetching employee data');
  }
})

})

});

  
</script>



