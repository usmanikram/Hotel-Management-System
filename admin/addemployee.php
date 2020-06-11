<?php
require_once ("../config/config.php");
$querydept="SELECT * FROM department";
$resultdept = $mysqli->query($querydept);
$countdept = $resultdept->num_rows;
$queryservice="SELECT * FROM service";
$resultservice = $mysqli->query($queryservice);
$countservice= $resultservice->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Add Employee · Admin Panel · HMS</title>

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
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Hotel Management System</a>
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
                        <a class="nav-link  active" href="employees.php">
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
                <h1 class="h2">Add Employee</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button onclick="location.href='employees.php';" type="button" class="btn btn-sm btn-outline-secondary">Go Back</button>

                    </div>
                </div>
            </div>

            <form action="../model/employee/add.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Employee Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dob">DOB</label>
                        <input type="text" onfocus="(this.type='date')" class="form-control" name="dob" placeholder="Date of Birth">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cnic">CNIC</label>
                        <input type="text" class="form-control" name="cnic" placeholder="Citizen National Identity Card Number">
                    </div>
                </div>
                <div class="form-row">

                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Employee Address">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dob">DOJ</label>
                        <input type="text" onfocus="(this.type='date')" class="form-control" name="doj" placeholder="Date of Joining">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" name="designation" placeholder="Employee Designation">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="salary">Salary</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rs.</div>
                            </div>
                            <input type="text" class="form-control" name="salary" placeholder="Employee Salary">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" placeholder="Employee Contact Number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Employee Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Employee Password">
                    </div>
                </div>
                <div class="form-row">


                    <div class="form-group col-md-6">
                        <label for="department">Department</label>
                        <select class="form-control" name="department">
                            <?php
                            if($countdept==0)
                            {
                                echo '<option value="">No Datas have been created Yet</option>';
                            }
                            else
                            {
                            while($fetchdept = $resultdept->fetch_assoc())
                            {
                            ?>
                                <option value="<?php echo $fetchdept['deptID']; ?>">
                                    <?php echo $fetchdept['deptName']; ?></option>
                                <?php
                        }
                                }
                        ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="service">Service</label>
                        <select class="form-control" name="service">
                            <?php
                            if($countservice==0)
                            {
                                echo '<option value="">No Datas have been created Yet</option>';
                            }
                            else
                            {
                            while($fetchservice = $resultservice->fetch_assoc())
                            {
                                ?>
                                <option value="<?php echo $fetchservice['serviceID']; ?>">
                                    <?php echo $fetchservice['serviceName']; ?></option>
                                <?php
                            }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <button type=submit" class="btn btn-sm btn-outline-secondary">Add Employee</button>
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
