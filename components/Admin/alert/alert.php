<?php 

if(isset($_GET['status']) && $_GET['status']=='deleted'){
    echo "<div class='alert alert-success' id='success-alert' role='alert'>
      Deleted Successfully.
    </div>"; 
  }
elseif(isset($_GET['status']) && $_GET['status']=='updated'){
    echo "<div class='alert alert-success' id='success-alert' role='alert'>
      Updated Successfully.
    </div>"; 
}
elseif(isset($_GET['status']) && $_GET['status']=='inserted'){
    echo "<div class='alert alert-success' id='success-alert' role='alert'>
      Added Successfully.
    </div>"; 
}
?>