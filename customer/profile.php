<?php
require_once ("../model/customer/profile/view.php");
$customername=$customerid="";
if(isset($_SESSION['customername']))
{
    $customername=$_SESSION['customername'];
    $customerid=$_SESSION['customerid'];

}
else
{
    $msg= "Login First";
    header("Location: ../customerlogin.php?message=$msg");
}
$customer=$_SESSION['custview'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Profile · Customer Panel · HMS</title>



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
                        <a class="nav-link" href="reservations.php">
                            <span data-feather="trello"></span>
                            Reservations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">
                            <span data-feather="shopping-cart"></span>
                            Services
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
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">
                            <span data-feather="user"></span>
                            My Profile<span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>


            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">My Profile</b></h1>

                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
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
            <form action="../model/customer/profile/update.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" name="id" value="<?php echo $customer->getcustID(); ?>" readonly>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $customer->getcustName(); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dob">DOB</label>
                        <input type="date"  class="form-control" name="dob" value="<?php echo $customer->getcustDOB(); ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cnic">CNIC</label>
                        <input type="text" class="form-control" name="cnic" value="<?php echo $customer->getcustCNIC(); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" value="<?php echo $customer->getcustContact(); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $customer->getcustAddress(); ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $customer->getcustEmail(); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $customer->getcustPassword(); ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ccno">Credit Card Number</label>
                        <input type="text" class="form-control" name="ccno" value="<?php echo $customer->getcustCCNO(); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ccexpiry">Credit Card Expiry</label>
                        <input type="date"  class="form-control" name="ccexpiry" value="<?php echo $customer->getcustCCExpiry(); ?>">
                    </div>
                </div>
                <button type=submit" class="btn btn-sm btn-outline-secondary">Update My Profile</button>
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
