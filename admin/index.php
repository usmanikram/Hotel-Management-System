<?php
session_start();
$adminname="";
if(isset($_SESSION['name']))
    {
    $adminname=$_SESSION['name'];

        require_once ("../config/config.php");
        $queryroom="SELECT * FROM room";
        $resultroom = $mysqli->query($queryroom);
        $countroom = $resultroom->num_rows;
        $querycustomer="SELECT * FROM customer";
        $resultcustomer = $mysqli->query($querycustomer);
        $countcustomer = $resultcustomer->num_rows;
        $queryreservation="SELECT * FROM reservation";
        $resultreservation = $mysqli->query($queryreservation);
        $countreservation = $resultreservation->num_rows;
        $queryemployee="SELECT * FROM employee";
        $resultemployee = $mysqli->query($queryemployee);
        $countemployee = $resultemployee->num_rows;
        $querydept="SELECT * FROM department";
        $resultdept = $mysqli->query($querydept);
        $countdept = $resultdept->num_rows;
        $querybill="SELECT * FROM bill";
        $total=0;
        $resultbill = $mysqli->query($querybill);
        while($billtotal = $resultbill->fetch_assoc())
        {
            $total=$total+$billtotal['amount'];
        }
    }
else
    {
        $msg= "Login First";
        header("Location: ../adminlogin.php?message=$msg");
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Admin Panel · HMS</title>



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
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
</head>
<body>


    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="index.php">Hotel Management System</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
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
                        <a class="nav-link active" href="index.php">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
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
                        <a class="nav-link" href="employees.php">
                            <span data-feather="users"></span>
                            Employees
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
                    <li class="nav-item">
                        <a class="nav-link" href="complaints.php">
                            <span data-feather="alert-circle"></span>
                            Complaints
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">
                            <span data-feather="archive"></span>
                            Feedback
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
                        <a class="nav-link" href="reports/reservation.php">
                            <span data-feather="trello"></span>
                            Reservations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports/room.php">
                            <span data-feather="briefcase"></span>
                            Rooms
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports/roomtype.php">
                            <span data-feather="type"></span>
                            Room Type
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports/customer.php">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports/employee.php">
                            <span data-feather="users"></span>
                            Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports/income.php">
                            <span data-feather="dollar-sign"></span>
                            Income
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports/expense.php">
                            <span data-feather="dollar-sign"></span>
                            Expense
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports/department.php">
                            <span data-feather="truck"></span>
                            Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports/complaint.php">
                            <span data-feather="alert-circle"></span>
                            Complaints
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Welcome <b><?php echo $adminname; ?>!</b></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>

            <div class="card-deck">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header" align="center"><h3>Total Rooms</h3></div>
                    <div class="card-body">
                        <h1 class="card-title" align="center"><?php echo $countroom; ?></h1>
                        </div>
                </div>
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header" align="center"><h3>Total Customers</h3></div>
                    <div class="card-body">
                        <h1 class="card-title" align="center"><?php echo $countcustomer; ?></h1>
                    </div>
                </div>
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header" align="center"><h3>Total Reservations</h3></div>
                    <div class="card-body">
                        <h1 class="card-title" align="center"><?php echo $countreservation; ?></h1>
                    </div>
                </div>
            </div>


            <div class="card-deck">

                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header" align="center"><h3>Total Employees</h3></div>
                    <div class="card-body">
                        <h1 class="card-title" align="center"><?php echo $countemployee; ?></h1>
                    </div>
                </div>

                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header"  align="center"><h3>Total Earnings</h3></div>
                    <div class="card-body">
                        <h1 class="card-title" align="center">Rs.<?php echo $total; ?></h1>
                    </div>
                </div>


                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header" align="center"><h3>Total Departments</h3></div>
                    <div class="card-body">
                        <h1 class="card-title" align="center"><?php echo $countdept; ?></h1>
                    </div>
                </div>

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
