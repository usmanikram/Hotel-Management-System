<?php
session_start();
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../error.php');
    exit;
}
?>
<?php
$file= 'config/config.php';
if(file_exists($file))
{
    require_once ('config/config.php');
}
else
{
    header("Location: setup/index.php");
}
?>
<?php
require_once ("config/config.php");
$startdate=$enddate=$capacity=$roomid="";
if(isset($_POST['startdate'])&&isset($_POST['enddate'])&&isset($_POST['capacity']))
{
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $capacity=$_POST['capacity'];
}


$queryroom="SELECT
    * FROM room join roomtype on room.roomType=roomtype.rtypeID WHERE roomID   NOT IN 
(
        SELECT reservation.roomID FROM reservation LEFT Outer JOIN
            room ON reservation.roomID = room.roomID 
        WHERE resStartDate<'$startdate'AND resEndtDate>='$enddate' 
) AND room.roomStatus='1' AND roomtype.rtypeCapacity>='$capacity'

";
$resultroom = $mysqli->query($queryroom);
$countroom= $resultroom->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Room Availability · HMS</title>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">

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
    <link href="css/cover.css" rel="stylesheet">
</head>
<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">HMS</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="index.html">Home</a>
                <a class="nav-link" href="customerlogin.php">Customer Login</a>
                <a class="nav-link" href="employeelogin.php">Employee Login</a>
                <a class="nav-link" href="adminlogin.php">Admin Login</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <div class="table-responsive">

            <table class='table table-light table-bordered table-striped'>
                <thead>
                <tr>
                    <th>Room No.</th>
                    <th>Category</th>
                    <th>Capacity(Maximum)</th>
                    <th>Rent Per Night(Rs.)</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if($countroom==0)
                {
                    echo '<option value="">No Datas have been created Yet</option>';
                }
                else
                {
                    while($fetchroom = $resultroom->fetch_assoc())
                    {
                        ?>
                <tr>
                    <td> <?php echo $fetchroom['roomID']; ?></td>
                    <td> <?php echo $fetchroom['rtypeName']; ?></td>
                    <td> <?php echo $fetchroom['rtypeCapacity']; ?></td>
                    <td> <?php echo $fetchroom['rtypePrice']; ?></td>

                        <?php

                    }
                }
                ?>
                </tr>
                </tbody>
            </table>
        </div>
        <main role="main" class="inner cover">
            <h3 class="cover-heading">Please Sign In To Book Room </h3>
            <p class="lead">
                <a href="customerlogin.php" class="btn btn-lg btn-secondary">Sign In</a>
            <h3 class="cover-heading">Don't Have Account ? Sign Up Below</h3>
            <a href="customersignup.php" class="btn btn-lg btn-secondary">Sign Up</a>
            <a href="index.php" class="btn btn-lg btn-secondary">Go Back</a>
            </p>

        </main>

    </main>


    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        </div>
    </footer>
</div>
</body>
</html>
