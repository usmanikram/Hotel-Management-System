<?php
require_once("../config/config.php");
$id="";
if(isset($_POST['id']))
{
    $id=$_POST['id'];
}
$querycustomer = "SELECT * FROM customer c join reservation res join room r  on c.custID=$id and c.custID=res.custID and r.roomID=res.roomID";
$resultcustomer = $mysqli->query($querycustomer);
$countcustomer= $resultcustomer->num_rows;
$fetchcustomer = $resultcustomer->fetch_assoc();

$billquery="SELECT DATEDIFF(resEndtDate,resStartDate)*rt.rtypePrice as 
Total FROM reservation r JOIN room ro JOIN roomtype rt on 
r.custID=$id and r.roomID=ro.roomID and ro.roomType=rt.rtypeID";
$billresult=$mysqli->query($billquery);
$billfetch=$billresult->fetch_assoc();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Bills · Admin Panel · HMS</title>

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
                        <a class="nav-link active" href="bills.php">
                            <span data-feather="file"></span>
                            Bills<span class="sr-only">(current)</span>
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
                <h1 class="h2">Bills</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button onclick="location.href='addbill.php';" type="button" class="btn btn-sm btn-outline-secondary">Go Back</button>

                    </div>
                </div>
            </div>

            <form action="../model/admin/bill/add.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="name">Customer ID</label>
                    <input type="text" class="form-control" name="custid" value="<?php echo $fetchcustomer['custID']; ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                    <label for="name">Customer Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $fetchcustomer['custName']; ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                    <label for="name">Reservation ID:</label>
                    <input type="text" class="form-control" name="resID" value="<?php echo $fetchcustomer['resID']; ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">Room No:</label>
                        <input type="text" class="form-control" name="roomid" value="<?php echo $fetchcustomer['roomID']; ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                    <label for="name">Reservation Start Date:</label>
                    <input type="date" class="form-control" name="startdate" value="<?php echo $fetchcustomer['resStartDate']; ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                    <label for="name">Reservation End Date:</label>
                    <input type="date" class="form-control" name="enddate" value="<?php echo $fetchcustomer['resEndtDate']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Details:</label>
                    <input type="text" class="form-control" name="details" value="<?php echo $fetchcustomer['roomDetails']; ?>" readonly>
                </div>

                <div class="form-group">
                        <label for="name">Total Bill:</label>
                        <input type="text" class="form-control" name="amount" value="<?php echo $billfetch['Total']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="method">Payment Method</label>
                    <select class="form-control" name="method" required>

                        <option value=""></option>
                        <option value="Cash">Cash</option>
                        <option value="Credit Card">Credit Card</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Remarks:</label>
                    <input type="text" class="form-control" name="remarks" placeholder="Remarks" required>
                </div>
                <button type=submit" class="btn btn-sm btn-outline-secondary">Add Bill</button>

            </form>


        </main>

        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="../js/dashboard.js"></script></body>
</html>
