<?php
session_start();
require_once "../../../classes/reservation.php";

$customerid=$roomid=$startdate=$enddate="";

if(isset($_POST['customerid']) && isset($_POST['roomid']) && isset($_POST['startdate'])
&& isset($_POST['enddate']))
{
    $customerid=$_POST['customerid'];
    $roomid=$_POST['roomid'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];

}

$reservation = new reservation(NULL,$customerid,$roomid,$startdate,$enddate);


$_SESSION['reservation'] = $reservation;

?>

