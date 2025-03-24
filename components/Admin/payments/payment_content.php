<?php 
include '../../database/db.php';

$payments = "select * from payments";
$get_payments = $conn->prepare($payments);
$get_payments->execute();
$payments = $get_payments->fetchAll();
// print_r($payments);
// print_r($_POST);

include './services/delete.php';
include '../alert/alert.php';
?>
<head>
  <link rel="stylesheet" href="../index.css">
</head>
<div>
    <h1>Payments</h1>
    <?php include 'modal.php'?>
    <!-- <a href="payment.php"> <button class="btn btn-primary adButton">Add</button> </a> -->

<table id="myTable" class="display">
  <thead>
    <tr>
      <th>Employee Id</th>
      <th>Date</th>
      <th>Gross salary</th>
      <th>Deduction</th>
      <th>Net Salary</th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>
  <?php 

    foreach($payments as $payment){
      echo "<tr>
      <td>$payment[employee_id]</td>
      <td>$payment[pay_date]</td>
      <td>$payment[gross_salary]</td>
      <td>$payment[deduction_on_salary]</td>
      <td>$payment[net_salary]</td>";
      echo "<td>
      <a href='#?edit_id=" . $payment['id'] . "'>
      <button type='button' class='btn btn-success editButton' data-bs-toggle='modal' data-bs-target='#paymentModal'
data-bs-whatever='@mdo' value='$payment[id]'>
        Edit
      </button>
    </a>
      <a href='payment.php?delete_id=$payment[id]'>
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
    var payment_id = $(this).val(); 
    console.log(payment_id);

    $.ajax({
      method: 'POST',
      url: 'get_payment_data.php',
      data: {id:payment_id},
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      success: function(response){
        console.log(response);
          $('#pay_date').val(response.pay_date);
          $('#gross_salary').val(response.gross_salary);
          $('#deduction_on_salary').val(response.deduction_on_salary);
          $('#net_salary').val(response.net_salary);
          
          $(`option[value='${response.employee_id}']`).prop('selected', true);

          $('#payment_id').val(response.id);

          //console.log($(`option[value='${response.employee_id}']`));
      },
      error: function(){
        alert('Error in fetching employee data');
      }
    })

    });

    $('#gross_salary, #deduction_on_salary').on('keyup', function(){
      let gross_salary = parseFloat($('#gross_salary').val()) || 0;
      let deduction_on_salary = parseFloat($('#deduction_on_salary').val()) || 0;

      let net_payment = gross_salary - deduction_on_salary;
      $('#net_salary').val(net_payment);
    });


  });
</script>
