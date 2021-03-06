<?php
session_start();
$customername=$customerid="";
if(isset($_SESSION['customername']))
{
    $customername=$_SESSION['customername'];
    $customerid=$_SESSION['customerid'];

    require_once ("../config/config.php");
    $querycomp="SELECT * FROM complaint where custID='$customerid'";
    $resultcomp = $mysqli->query($querycomp);
    $countcomp = $resultcomp->num_rows;
}
else
{
    $msg= "Login First";
    header("Location: ../customerlogin.php?message=$msg");
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
    <title>Complaints· Customer Panel · HMS</title>



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
                        <a class="nav-link active" href="complaints.php">
                            <span data-feather="alert-circle"></span>
                            Complaints<span class="sr-only">(current)</span>
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
                        <a class="nav-link" href="profile.php">
                            <span data-feather="user"></span>
                            My Profile
                        </a>
                    </li>
                </ul>


            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">My Complaints</b></h1>

                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button onclick="location.href='addcomplaint.php';" type="button" class="btn btn-sm btn-outline-secondary">Add New Complaint</button>
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

            <table class='table table-light table-bordered table-striped' id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Details</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($countcomp==0)
                {
                    echo '<option value="">No Complaints Found</option>';
                }
                else
                {
                while($fetchcomp = $resultcomp->fetch_assoc())
                {
                ?>
                <tr>
                    <td> <?php echo $fetchcomp['compID']; ?></td>
                    <td> <?php echo $fetchcomp['compDate']; ?></td>
                    <td> <?php echo $fetchcomp['compDetail']; ?></td>
                    <td> <?php echo $fetchcomp['remarks']; ?></td>
                    <td>
                        <a href='deletecomplaint.php?id=<?php echo $fetchcomp['compID']; ?>' title='Delete Record' data-toggle='tooltip'>Delete</a>
                    </td>
                    <?php
                    }
                    }
                    ?>
                </tr>
                </tbody>
            </table>


        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="../js/dashboard.js"></script></body>

</html>
