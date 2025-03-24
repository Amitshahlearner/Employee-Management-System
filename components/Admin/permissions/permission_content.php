<?php 
include '../../database/db.php';
$permissions = "select * from permissions";
$get_permissions = $conn->prepare($permissions);
$get_permissions->execute();
$permissions = $get_permissions->fetchAll();
// print_r($_POST);

include '../alert/alert.php';
include './services/delete.php';

?>
<head>
  <link rel="stylesheet" href="../index.css">
</head>
<div>
    <h1>Permissions</h1>
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

    foreach($permissions as $permission){
      echo "<tr>
      <td>$permission[id]</td>
      <td>$permission[permission_name]</td>";
      echo "<td>
      <a href='#?edit_id=" . $permission['id'] . "'>
      <button type='button' class='btn btn-success editButton' data-bs-toggle='modal' data-bs-target='#permissionModal'
data-bs-whatever='@mdo' value='$permission[id]'>
        Edit
      </button>
    </a>
      <a href='permission.php?delete_id=$permission[id]'>
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
    var permission_id = $(this).val(); 
    console.log(permission_id);

    $.ajax({
    method: 'POST',
    url: 'get_permission_data.php',
    data: {id:permission_id},
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(response){
        console.log(response);
        $('#permission_name').val(response.permission_name);

        $('#permission_id').val(response.id);
    },
    error: function(){
        alert('Error in fetching employee data');
    }
    })

})

});
</script>
