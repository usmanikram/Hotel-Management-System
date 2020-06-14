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
$startdate=$enddate=$capacity="";
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
    <title>Room Availability Check· HMS</title>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

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
    <link href="css/album.css" rel="stylesheet">
    </head>
<body>


<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1>Room Availability Check</h1>
            <h3>Following rooms are available for reservation according to checkin and checkout date
                entered by you.</h3>
            <p class="lead text-muted">For room reservation you must have a account.</p>
            <p>
                <a href="index.php" class="btn btn-primary my-2">Go Back</a>

            </p>
        </div>
    </section>
    <?php
    while($fetchroom = $resultroom->fetch_assoc())
    {
    ?>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row h-100">
                <div class="col-sm-12 my-auto">
                    <div class="card card-block w-25 mx-auto">
                        <?php  echo "<img id='myImg' width='275' height='250' src='images/room/".$fetchroom['roomImage']."' >"; ?>
                        <div class="card-body">
                            <p class="card-text">Room No: <?php echo $fetchroom['roomID']; ?></p>
                            <p class="card-text">Room Type: <?php echo $fetchroom['rtypeName']; ?></p>
                            <p class="card-text">Room Capcity: <?php echo $fetchroom['rtypeCapacity']; ?></p>
                            <p class="card-text">Room Rent Per Night: <?php echo $fetchroom['rtypePrice']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted"><b>From:</b><?php echo $startdate;?>, <b>To:</b><?php echo $enddate;?> </small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div
        <?php
        }
        ?>
    </div>

</main>
<section class="jumbotron text-center">
    <div class="container">
        <p class="lead text-muted">For room reservation you must have a account.</p>
        <p>
            <a href="customerlogin.php" class="btn btn-primary my-2">Sign In (If You Have A Account)</a>
            <a href="customersignup.php" class="btn btn-secondary my-2">Register Here (If You Don't Have A Account)</a>
        </p>
        <p>
            <a href="index.php" class="btn btn-primary my-2">Go Back</a>

        </p>
    </div>
</section>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p> &copy; Hotel Management System, All Rights Reserved.</p>

    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/jquery.slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.js"></script></body>
</html>
