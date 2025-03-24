<?php 
include '../../database/db.php';

$projects = "select * from projects";
$get_projects = $conn->prepare($projects);
$get_projects->execute();
$projects = $get_projects->fetchAll();
// print_r($projects);
// print_r($_POST);
include './services/delete.php';
include '../alert/alert.php';
?>
<head>
  <link rel="stylesheet" href="../index.css">
</head>
<div>
    <h1>Projects</h1>
    <?php include 'modal.php';?>

<table id="myTable" class="display">
  <thead>
    <tr>
      <th>Id</th>
      <th>Project</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 

    foreach($projects as $project){
      echo "<tr>
      <td>$project[id]</td>
      <td>$project[project_name]</td>";
      echo $project['status'] ? "<td>Active</td>" : "<td>InActive</td>";
      echo "<td>
      <a href='#?edit_id=" . $project['id'] . "'>
      <button type='button' class='btn btn-success editButton' data-bs-toggle='modal' data-bs-target='#projectModal'
data-bs-whatever='@mdo' value='$project[id]'>
        Edit
      </button>
    </a>
      <a href='project.php?delete_id=$project[id]'>
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
var project_id = $(this).val(); 
console.log(project_id);

$.ajax({
  method: 'POST',
  url: 'get_project_data.php',
  data: {id:project_id},
  dataType: 'json',
  contentType: 'application/x-www-form-urlencoded',
  success: function(response){
    console.log(response);
      $('#project_name').val(response.project_name);

      if(response.status==1){
            $("#active").prop('selected', true);
      }else{
            $("#inactive").prop('selected', true);
      }

      $('#project_id').val(response.id);
  },
  error: function(){
    alert('Error in fetching employee data');
  }
})

})

});
</script>
