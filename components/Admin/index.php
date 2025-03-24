<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <!-- <link rel="stylesheet" href="index.css" > -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <title>EMS APP</title>
</head>

<body>
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <div class="sidebar-header">
                    <div class="sidebar-brand">
                        <a href="#">EMS</a>
                    </div>
                </div>
                <li><a href="https://localhost/php/EMS/components/Admin/index.php">Home</a></li>
                <li><a href="https://localhost/php/EMS/components/Admin/employee/employee.php">Employee</a></li>
                <li><a href="https://localhost/php/EMS/components/Admin/departments/department.php">Departments</a></li>
                <li><a href="https://localhost/php/EMS/components/Admin/roles/role.php">Roles</a></li>
                <li><a href="https://localhost/php/EMS/components/Admin/permissions/permission.php">Permissions</a></li>
                <!-- <li class="dropdown">
                    <a href="#works" class="dropdown-toggle" data-toggle="dropdown">Works <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu animated fadeInLeft" role="menu">
                        <div class="dropdown-header">Dropdown heading</div>
                        <li><a href="#pictures">Pictures</a></li>
                        <li><a href="#videos">Videeos</a></li>
                        <li><a href="#books">Books</a></li>
                        <li><a href="#art">Art</a></li>
                        <li><a href="#awards">Awards</a></li>
                    </ul>
                </li> -->
                <li><a href="https://localhost/php/EMS/components/Admin/salary/salary.php">Salary</a></li>
                <li><a href="https://localhost/php/EMS/components/Admin/payments/payment.php">Payments</a></li>
                <li><a href="https://localhost/php/EMS/components/Admin/positions/position.php">Positions</a></li>
                <li><a href="https://localhost/php/EMS/components/Admin/projects/project.php">Projects</a></li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <?php
                            include 'page_call.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script >
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
<!-- <script src="index.js"></script> -->

</html>