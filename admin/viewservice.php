<?php
session_start();
$adminname="";
if(isset($_SESSION['name']))
{
    $adminname=$_SESSION['name'];
    require_once "../model/admin/service/view.php";
    $service= $_SESSION['serviceview'];
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
    <title>View Service · Admin Panel · HMS</title>

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
                        <a class="nav-link  active" href="services.php">
                            <span data-feather="shopping-cart"></span>
                            Services<span class="sr-only">(current)</span>
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
                <h1 class="h2">View Service</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button onclick="location.href='services.php';" type="button" class="btn btn-sm btn-outline-secondary">Go Back</button>

                    </div>
                </div>

            </div>


            <form action="../model/admin/service/update.php" method="post" >
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id">ID:</label>
                        <input type="text" class="form-control" name="sid" value="<?php echo $service->getserviceID(); ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="sname" value="<?php echo $service->getserviceName(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <input type="text" class="form-control" name="sdetails" value="<?php echo $service->getserviceDetail(); ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rs.</div>
                            </div>
                            <input type="text" class="form-control" name="sprice" value="<?php echo $service->getservicePrice(); ?>">
                        </div>
                    </div>
                </div>
                <button type=submit" class="btn btn-sm btn-outline-secondary">Update Service</button>
            </form>


        </main>

    </div>


</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="../js/dashboard.js"></script></body>
</html>
