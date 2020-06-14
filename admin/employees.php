<?php
require_once ("../config/config.php");
$queryemployee="SELECT * FROM employee e join department d where e.deptID=d.deptID";
$resultemployee = $mysqli->query($queryemployee);
$countemployee = $resultemployee->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Employees · Admin Panel · HMS</title>


    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <script>
        function printContent(el){
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
    </script>
    <link href="../css/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="index.php">Hotel Management System</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Management</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <li class="nav-item">
                        <a class="nav-link" href="room.php">
                            <span data-feather="briefcase"></span>
                            Rooms
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="roomtype.php">
                            <span data-feather="type"></span>
                            Room Type
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">
                            <span data-feather="shopping-cart"></span>
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservations.php">
                            <span data-feather="trello"></span>
                            Reservations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="employees.php">
                            <span data-feather="users"></span>
                            Employees<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="departments.php">
                            <span data-feather="truck"></span>
                            Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bills.php">
                            <span data-feather="file"></span>
                            Bills
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Reports</span>
                    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Employees</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button onclick="location.href='addemployee.php';" type="button" class="btn btn-sm btn-outline-secondary">Add New Employee</button>
                        <button id="print" type="button" onclick="printContent('table');" class="btn btn-sm btn-outline-secondary">Print</button>
                    </div>
                </div>

            </div>
            <?php
            if(isset($_GET["message"]))
            {
                $msg = $_GET["message"];
                echo "<b><p style='color: red'>$msg</p></b>";
            }
            ?>

            <div class="table-responsive">

                <table class='table table-light table-bordered table-striped' id="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>CNIC</th>
                        <th>Address</th>
                        <th>Date Of Joining</th>
                        <th>Designation</th>
                        <th>Salary</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Department Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($countemployee==0)
                    {
                        echo '<option value="">No Datas have been created Yet</option>';
                    }
                    else
                    {
                    while($fetchemployee = $resultemployee->fetch_assoc())
                    {
                    ?>
                    <tr>
                        <td> <?php echo $fetchemployee['empID']; ?></td>
                        <td> <?php echo $fetchemployee['empName']; ?></td>
                        <td> <?php echo $fetchemployee['empDOB']; ?></td>
                        <td> <?php echo $fetchemployee['empGender']; ?></td>
                        <td> <?php echo $fetchemployee['empCNIC']; ?></td>
                        <td> <?php echo $fetchemployee['empAddress']; ?></td>
                        <td> <?php echo $fetchemployee['empDOJ']; ?></td>
                        <td> <?php echo $fetchemployee['empDesignation']; ?></td>
                        <td> <?php echo $fetchemployee['empSalary']; ?></td>
                        <td> <?php echo $fetchemployee['empContact']; ?></td>
                        <td> <?php echo $fetchemployee['empEmail']; ?></td>
                        <td> <?php echo $fetchemployee['deptName']; ?></td>
                        <td>
                            <a href='viewemployee.php?id=<?php echo $fetchemployee['empID']; ?>' title="view record" data-toggle='tooltip'>View/Update</a>
                            <a href='deleteemployee.php?id=<?php echo $fetchemployee['empID']; ?>' title='Delete Record' data-toggle='tooltip'>Delete</a>
                        </td>
                        <?php
                        }
                        }
                        ?>
                    </tr>
                    </tbody>
                </table>

            </div>

        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="../js/dashboard.js"></script></body>
</html>
