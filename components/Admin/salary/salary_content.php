<?php 
include '../../database/db.php';

$salary = "select s.*,e.emp_name from salary s join employee e on s.employee_id=e.id";
$get_salary = $conn->prepare($salary);
$get_salary->execute();
$salary = $get_salary->fetchAll();
// print_r($salarys);
// print_r($_POST);

include './services/delete.php';
include '../alert/alert.php';
?>
<head>
  <link rel="stylesheet" href="../index.css">
</head>
<div>
    <h1>Salary</h1>
    <?php include 'modal.php'?>
    <!-- <a href="salary.php"> <button class="btn btn-primary adButton">Add</button> </a> -->

<table id="myTable" class="display">
  <thead>
    <tr>
      <th>Id</th>
      <th>Employee Name</th>
      <th>Base</th>
      <th>Allowance</th>
      <th>Bonus</th>
      <th>Total</th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>
  <?php 

    foreach($salary as $salary){
      echo "<tr>
      <td>$salary[id]</td>
      <td>$salary[emp_name]</td>
      <td>$salary[base_salary]</td>
      <td>$salary[allowance]</td>
      <td>$salary[bonus]</td>
      <td>$salary[total]</td>";
      echo "<td>
      <a href='#?edit_id=" . $salary['id'] . "'>
      <button type='button' class='btn btn-success editButton' data-bs-toggle='modal' data-bs-target='#salaryModal'
data-bs-whatever='@mdo' value='$salary[id]'>
        Edit
      </button>
    </a>
      <a href='salary.php?delete_id=$salary[id]'>
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
    var salary_id = $(this).val(); 
    console.log(salary_id);

    $.ajax({
      method: 'POST',
      url: 'get_salary_data.php',
      data: {id:salary_id},
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      success: function(response){
        console.log(response);
          $('#base_salary').val(response.base_salary);
          $('#salary_allowance').val(response.allowance);
          $('#salary_bonus').val(response.bonus);
          $('#total_salary').val(response.total);
          
          $(`option[value='${response.employee_id}']`).prop('selected', true);

          $('#salary_id').val(response.id);

          console.log($(`option[value='${response.employee_id}']`));
      },
      error: function(){
        alert('Error in fetching employee data');
      }
    })

    });

    $('#base_salary, #salary_allowance, #salary_bonus').on('keyup', function(){
      let base_salary = parseFloat($('#base_salary').val()) || 0;
      let salary_allowance = parseFloat($('#salary_allowance').val()) || 0;
      let salary_bonus = parseFloat($('#salary_bonus').val()) || 0;

      let total_salary = base_salary + salary_allowance + salary_bonus;
      $('#total_salary').val(total_salary);
    });


  });
</script>
