<?php
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

$querycustomer="SELECT * FROM customer";
$resultcustomer = $mysqli->query($querycustomer);
$countcustomer = $resultcustomer->num_rows;
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
    <title>Hotel Management System</title>



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
        <form action="../model/reservation/add.php" method="post">

            <div class="form-group">
                <label for="room">Room</label>
                <select class="form-control" name="roomid">
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
                            <option value="<?php echo $fetchroom['roomID']; ?>">
                                Room No:<?php echo $fetchroom['roomID']; ?>
                                Price:<?php echo $fetchroom['rtypePrice']; ?>
                                TypeName:<?php echo $fetchroom['rtypeName']; ?>
                                Capacity:<?php echo $fetchroom['rtypeCapacity']; ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Reservation Start Date:</label>
                    <input type="date" class="form-control" name="startdate" value="<?php echo $startdate; ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Reservation End Date:</label>
                    <input type="date" class="form-control" name="enddate" value="<?php echo $enddate; ?>" readonly>
                </div>
            </div>


            <button type=submit" class="btn btn-sm btn-outline-secondary">Confirm Reservation</button>
        </form>
    </main>

    
    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        </div>
    </footer>
</div>
</body>
</html>
